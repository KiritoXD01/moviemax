<?php

namespace App\Repositories\Providers;

use Illuminate\Support\ServiceProvider;

class AuthProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\AuthRepository',
            'App\Repositories\Eloquent\EloquentAuthRepository'
        );
    }
}