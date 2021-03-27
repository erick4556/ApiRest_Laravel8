<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function getMovies()
    {
        $movies = Movie::all();
        return response()->json($movies);
    }

    public function showMovie($id)
    {
        $movies = Movie::find($id);
        return response()->json($movies);
    }

    public function storeMovie(Request $request)
    {
        $movie = Movie::create($request->all()); //Obtener todos los parametros colocados en el post request.
        return response()->json($movie, 201);
    }

    public function editMovie(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        return response()->json($movie, 200);
    }

    public function deleteMovie($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return response(null, 204);
    }
}
