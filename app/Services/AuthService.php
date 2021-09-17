<?php
namespace App\Services;

use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(array $requestData)
    {
        $user = User::query()
            ->where(function ($query) use ($requestData){
                $query->where("email", $requestData["username_email"])
                ->orWhere("username", $requestData["username_email"]);
            })
            ->where('is_admin', 1)
            ->first();

        if (!$user || !Hash::check($requestData["password"], $user->password)) {
            return response(["message" => "Wrong Credentials"]);
        }

        $credentials = [
            "email" => $requestData["username_email"],
            "password" => $requestData["password"]
        ];

        $auth = Auth::attempt($credentials);

        if($auth) {
            $token = $user->createToken("plainTextToken api login")->plainTextToken;

            return [
                'user' => $user,
                'token' => $token,
            ];
        }

        return response(["message" => "User could not login"]);
    }

    public function logout(): void
    {
        auth()->user()->tokens()->delete();
    }
}