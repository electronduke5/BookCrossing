<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return GenreResource::collection(Genre::all());
    }

    public function store(GenreRequest $request)
    {
        $created_genre = Genre::create($request->validated());
        return new GenreResource($created_genre);
    }

    public function show(Genre $genre)
    {
        return new GenreResource($genre);
    }

    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->update($request->validated());
        return new GenreResource($genre);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->noContent();
    }
}
