<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();
        //Поиск
        if ($title = $request->input('search')) {
            $query->where('title', 'like', "%$title%");
        }
        //Сортировка
        if ($sort = $request->input('sort')) {
            $query->orderBy($sort);
        }
        //Сортировка по убыванию
        if ($sort = $request->input('sortDesc')) {
            $query->orderByDesc($sort);
        }
        //Фильтрация
        if ($filter = $request->input('filterByAuthor')) {
            $query->where('author_id', $filter);
        }
        if ($filter = $request->input('filterByGenre')) {
            $query->where('genre_id', $filter);
        }
        return BookResource::collection($query->get());
    }

    public function store(BookRequest $request)
    {
        $created_book = Book::create($request->validated());
        return new BookResource($created_book);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return new BookResource($book);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->noContent();
    }
}
