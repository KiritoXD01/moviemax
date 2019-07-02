<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStorePostValidation;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->user = $userRepository;
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserStorePostValidation $request)
    {
        $user = $this->user->create($request->all());
        return redirect(route('users.edit', compact('user')));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {


        return $request->all();
    }
}
