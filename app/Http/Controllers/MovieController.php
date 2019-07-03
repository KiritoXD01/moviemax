<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieUpdatePostValidation;
use App\Models\Movie;
use App\Http\Requests\MovieStorePostValidation;
use App\Repositories\Contracts\MovieRepository;

class MovieController extends Controller
{
    protected $movie;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->middleware('auth');
        $this->movie = $movieRepository;
    }

    public function index()
    {
        $movies = Movie::all();

        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(MovieStorePostValidation $request)
    {
        $movie = $this->movie->create($request->all());
        return redirect(route('movies.edit', compact('movie')));
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(MovieUpdatePostValidation $request, Movie $movie)
    {
        $this->movie->update($request->all(), $movie);
        return redirect(route('movies.edit', compact('movie')));
    }
}