<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordPostValidation;
use App\Http\Requests\UserStorePostValidation;
use App\Http\Requests\UserUpdatePostValidation;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Support\Facades\Hash;

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

    public function update(UserUpdatePostValidation $request, User $user)
    {
        $this->user->update($request->all(), $user);
        return redirect(route('users.edit', compact('user')));
    }

    public function updatePassword(PasswordPostValidation $request, User $user)
    {
        if (!Hash::check($request->old_password, $user->password))
        {
            $request->session()->flash('failure', trans('messages.invalidPassword'));
            return redirect(route('users.edit', compact('user')));
        }

        $this->user->update($request->all(), $user);
        return redirect(route('users.edit', compact('user')));
    }
}