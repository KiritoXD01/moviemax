<?php

namespace App\Repositories\Providers;

use Illuminate\Support\ServiceProvider;

class MovieProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\MovieRepository',
            'App\Repositories\Eloquent\EloquentMovieRepository'
        );
    }
}