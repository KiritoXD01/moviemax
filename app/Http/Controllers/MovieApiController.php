<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Repositories\Contracts\MovieRepository;

class MovieApiController extends Controller
{
    protected $movie;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movie = $movieRepository;
    }

    public function search(Request $request)
    {
        $movies = Movie::where([
            ['title', 'like', '%'.$request->title.'%'],
            ['status', true]
        ])->get();

        return $movies;
    }

    public function addFavoriteMovie(Request $request)
    {
        return $this->movie->addFavoriteMovie($request->all());
    }
}
