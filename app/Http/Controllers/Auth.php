<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;

class Auth extends Controller
{
    private $authService = null;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function store(LoginRequest $request) {

        return $this->authService->store($request);
    }
}
