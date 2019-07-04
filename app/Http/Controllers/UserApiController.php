<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\UserStorePostValidation;
use App\Http\Requests\UserUpdatePostValidation;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;

class UserApiController extends Controller
{
    protected $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->user = $userRepository;
    }

    public function store(UserStorePostValidation $request)
    {
        $request['user_type'] = UserType::USER;
        $user = $this->user->create($request->all());
        return response()->json($user, 201);
    }

    public function update(UserUpdatePostValidation $request, User $user)
    {
        $this->user->update($request->all(), $user);
        return $user;
    }

    public function getfavoriteMovies(User $user)
    {
        $movies = $this->user->getUserFavoriteMovies($user);
        return $movies;
    }
}
