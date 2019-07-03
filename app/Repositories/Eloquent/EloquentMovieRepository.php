<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\MovieRepository;
use App\Models\Movie;

class EloquentMovieRepository implements MovieRepository
{
    protected $movie;

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    public function create(array $attributes)
    {
        $movie = $this->movie->create($attributes);
        
        if (isset($attributes['image']))
        {
            $movie->addMediaFromRequest('image')->toMediaCollection('movies');
        }

        return $movie;
    }

    public function update(array $attributes, Movie $movie)
    {
        return $movie->update($attributes);
    }

    public function destroy(Movie $movie)
    {
        return $movie->delete();
    }
}