<?php

namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\AuthRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EloquentAuthRepository implements AuthRepository
{
    /**
     * @param Request $request
     * @return array|bool
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!auth()->attempt($credentials)) {
            return false;
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return $response = [
            'access_token' => $tokenResult->accessToken,
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ];
    }

    /**
     * logout user..
     * @param Request $request
     * @return mixed
     */
    public function logout(Request $request)
    {
        return $request->user()->token()->revoke();
    }

}