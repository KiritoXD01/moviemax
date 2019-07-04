<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;

class EloquentUserRepository implements UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $attributes)
    {
        $attributes['birthdate'] = date_format(date_create($attributes['birthdate']), 'Y-m-d');
        return $this->user->create($attributes);
    }

    public function update(array $attributes, User $user)
    {
        if (isset($attributes['birthdate']))
            $attributes['birthdate'] = date_format(date_create($attributes['birthdate']), 'Y-m-d');

        return $user->update($attributes);
    }

    public function destroy(User $user)
    {
        return $user->delete();
    }

    public function getUserFavoriteMovies(User $user)
    {
        return $user->favorite_movies;
    }
}