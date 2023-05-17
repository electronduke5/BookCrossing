<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferRequest;
use App\Http\Requests\UserTransferRequest;
use App\Http\Resources\TransferResource;
use App\Models\Book;
use App\Models\Transfer;
use App\Models\User;
use App\Models\UserStatus;
use App\Models\UserTransfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{

    public function makeRequest(UserTransferRequest $request)
    {
        $created_request = UserTransfer::create($request->validated());
        $transfer = Transfer::all()->firstWhere('id', '=', $created_request->transfer_id);
        return new TransferResource($transfer);
    }

    public function makeTransfer(UserTransferRequest $request)
    {
        $request->validated();
        $transfer = Transfer::all()->firstWhere('id', '=', $request->transfer_id);
        $transfer->is_active = 0;
        $transfer->update(array($transfer));

        //echo 'transfer: '.$transfer;
        $new_reader = User::all()->firstWhere('id', '=', $request->user_id);
        //echo 'new reader: '.$new_reader;
        //$owner = new UserResource(User::all()->firstWhere('id', '=', $transfer->user_id));
        $owner = User::all()->firstWhere('id', '=', $transfer->user_id);
        //echo 'owner: '.$owner;
        $inactive_count = Transfer::all()->where('user_id', '=', $owner->id)->where('is_active', '=', 0)->count();
        echo '$inactive_count: '.$inactive_count;
        //var_dump($owner->transfers_count);

        $book = Book::all()->firstWhere('id', '=', $transfer->book_id);
        //echo 'old book: '.$book;
        $book->update(array('reader_id'=> $new_reader->id));
        //echo 'new book: '.$book;
        //echo '$owner->inactiveTransfersCount: '.$inactive_count;
        $status = UserStatus::all()->where('count', '<=', $inactive_count)->last();
        echo 'old status: '.$owner->status_id;
        echo 'new status: '.$status->id;
        if($status->id != $owner->status_id){
            $owner->status_id = $status->id;
            $owner->update(array($owner));
            echo 'NEW owner: '.$owner;
        }
        echo 'new status in owner: '.$owner->status_id;


        return new TransferResource($transfer);
    }

    public function index(Request $request)
    {
        $query = Transfer::query()->where('is_active', true)->orderByDesc('created_at');

        if($is_active = $request->input('active')){
            $query = Transfer::query()->where('is_active', '=',  $is_active == 'false' ? 0 : 1)->orderByDesc('created_at');
        }

        if ($user = $request->input('user')) {
            $query->where('user_id', "$user");
        }

        if ($book = $request->input('book')) {
            $query->where('book_id', "$book");
        }

        if ($title = $request->input('search')) {
            $query->join('books', "transfers.book_id", '=', "books.id")
            ->where('books.title', 'like', "%$title%");
        }
        //Сортировка
        if ($sort = $request->input('sort')) {
            $query->orderBy('created_at');
        }
        //Сортировка по убыванию
        if ($sort = $request->input('sortDesc')) {
            $query->orderByDesc('created_at');
        }
        return TransferResource::collection($query->get());
    }

    public function store(TransferRequest $request)
    {
        $created_transfer = Transfer::create($request->validated());
        return new TransferResource($created_transfer);
    }

    public function show(Transfer $transfer)
    {
        return new TransferResource($transfer);
    }

    public function update(TransferRequest $request, Transfer $transfer)
    {
        $transfer->update($request->validated());
        return new TransferResource($transfer);
    }

    public function destroy(Transfer $transfer)
    {
        $transfer->delete();
        return response()->noContent();
    }
}
