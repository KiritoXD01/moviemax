<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\UserStorePostValidation;
use App\Repositories\Contracts\UserRepository;

class UserApiController extends Controller
{
    protected $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->user = $userRepository;
    }

    public function create(UserStorePostValidation $request)
    {
        $request['user_type'] = UserType::USER;
        $user = $this->user->create($request->all());
        return response()->json($user, 201);
    }
}
