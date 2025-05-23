<?php

namespace App\Services;

use App\Models\Client;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\AuthException;

class jWTAuthenticate
{

    private $jwtSecret;
    private $jwtAlgorithm;

    public function __construct()
    {
        $this->jwtSecret = config('jwt.secret');
        $this->jwtAlgorithm = config('jwt.algorithm', 'HS256');
    }

    public function generateToken($dataUser)
    {
        $payload = [
            'iat' => time(),
            'exp' => time() + (30 * 60), // 30 minutos
            'user_id' => $dataUser->id,
            'email' => $dataUser->email
        ];

        $jwt = JWT::encode($payload, env("KEY_JWT"), 'HS256');
        // $decoded = JWT::decode($jwt, new Key(env("KEY_JWT"), 'HS256'));
        return $jwt;
    }
}
