<?php

namespace App\Repositories\Contracts;

use App\Models\Movie;

interface MovieRepository
{
    public function create(array $attributes);
    public function update(array $attributes, Movie $movie);
    public function destroy(Movie $movie);
    public function addFavoriteMovie(array $attributes);
}