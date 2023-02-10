<?php

namespace App\Http\Controllers;

use App\Http\Resources\WishlistResource;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(User $user)
    {
        return WishlistResource::collection(Wishlist::all());
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Wishlist $wishlist)
    {
        //
    }

    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return response()->noContent();
    }
}
