<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieApiController extends Controller
{
    public function search(Request $request)
    {
        $movies = Movie::where([
            ['title', 'like', '%'.$request->title.'%'],
            ['status', true]
        ])->get();

        return $movies;
    }
}
