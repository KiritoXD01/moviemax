<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface AuthRepository
{
    public function login(Request $request);
    public function logout(Request $request);
}