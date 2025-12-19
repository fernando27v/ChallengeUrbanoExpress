<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Iniciar Sesión de Usuario
     * 
     * Autentica a un usuario mediante email y contraseña y devuelve un token de acceso.
     */
    public function login(Request $request): JsonResponse
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credenciales)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }

        return response()->json([
            'message' => 'Credenciales inválidas'
        ], 401);
    }

    /**
     * Cerrar Sesión
     * 
     * Revoca el token de acceso actual del usuario.
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada exitosamente'
        ]);
    }
}
