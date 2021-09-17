<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        try {
            return $this->authService->login($request->all());

        } catch (\Exception $e) {
            return response(["message" => "error"]);
        }
    }

    public function logout()
    {
        $this->authService->logout();
        return [
            'message' => 'User logged out',
        ];
    }
}
