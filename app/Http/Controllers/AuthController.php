<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Repositories\Contracts\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(AuthRepository $authRepository)
    {
        $this->auth = $authRepository;
    }

    /**
     * @param LoginValidation $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginValidation $request)
    {
        $response = $this->auth->login($request);
        return $response ? response()->json([
            'access_token' => $response['access_token'],
            'token_type' => 'Bearer',
            'expires_at' => $response['expires_at']
        ]) : response()->json(array(
            'message' => 'Usuario o contraseña incorrectos.'), 401);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $response = $this->auth->logout($request);
        return $response ? response()->json(['message' => 'Te has desconectado correctamente.']) : response()->json(['message' => 'Ha ocurrido un error.']);
    }
}
