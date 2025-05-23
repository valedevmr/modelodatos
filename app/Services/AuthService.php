<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    private $jWTAuthenticate = null;
    public function __construct(jWTAuthenticate $jWTAuthenticate)
    {
        $this->jWTAuthenticate = $jWTAuthenticate;
    }



    public function store($request)
    {


        try {
            $usuario = Users::where('email', $request->email)->firstOrFail();

            // Si llega aquí, el usuario existe
            if (!$usuario) {
                return response()->json([
                    'success' => false,
                    'message' => 'Credenciales incorrectas'
                ], 401);
            }
            if (!Hash::check($request->password, $usuario->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Credenciales incorrectas'
                ], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Credenciales incorrectas'
            ], 409);
        }

        $token = $this->jWTAuthenticate->generateToken($usuario);
        return response()->json([
            'success' => true,
            'message' => 'Usuario correcto',
            'token' => $token
        ], 200);
    }
}
