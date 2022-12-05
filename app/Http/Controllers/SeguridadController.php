<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;

class SeguridadController extends Controller
{
    public function login(LoginRequest $request)
    {
        $usuario = Usuario::where('email', $request->email)->first();
        if (Hash::check($request->password, $usuario->password)) {
            $key = env('JWT_SECRET');
            $algorithm =env('JWT_ALGORITHM');
            $time = time();
            $token = array(
                'iat' => $time, // Tiempo que inició el token
                'exp' => $time + (1200 * 60), // Tiempo que expirará el token (+1 hora)
                'data' => [ // información del usuario
                    'usuario' => $usuario->nombres.' '.$usuario->apellidos,
                    'email' => $usuario->email,
                    'rol' => $usuario->rol,
                ],
            );
            $jwt = JWT::encode($token, $key, $algorithm);
            return response()->json([
                'transaccion' => true,
                'mensaje' => 'Se logró autenticar al usuario',
                'response' => [
                    'authorization' => [
                        'token' => $jwt,
                        'type' => 'bearer',
                    ],
                ],
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Contraseña invalida',
                'status' => 400
            ], 400);
        }
    }
}
