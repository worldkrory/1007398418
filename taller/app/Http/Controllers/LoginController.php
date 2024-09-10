<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Se usa para encriptar la contraseña
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        // Validar los datos del usuario
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Crear el nuevo usuario
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password), // Aquí se realiza el hashing usando la key de encriptacion de laravel
        ]);

        // Retornar una respuesta exitosa
        return response()->json(['user' => $user, 'message' => 'User successfully registered'], 201);
    }
}
