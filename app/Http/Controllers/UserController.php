<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserStoreRequest;
use App\Interfaces\UserSubmissionInterface;

class UserController extends Controller
{
    protected UserSubmissionInterface $userService;

    public function __construct(UserSubmissionInterface $userService)
    {
        $this->userService = $userService;
    }

    public function get()
    {
        return $this->userService->get();
    }

    public function create(UserStoreRequest $request)
    {
        return $this->userService->create($request->all());
    }
}