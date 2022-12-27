<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        
        $fields = $request;

        $email_check = User::where('email', $request->email)->first();
        if($email_check)
        {
            return response()->json(
            [
                'success'   => false, 
                'title'     => 'Erro no cadastro de usuário', 
                'message'   => 'Já existe um usuário cadastrado com esse e-mail!'
            ])->setStatusCode(401);
        }
      
        $user = User::create([
            'name'      => $fields['name'],
            'email'     => $fields['email'],
            'password'  => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;
        
        
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json(
            [
                'success'   => true, 
                'title'     => 'Usuário cadastrado!', 
                'message'   => 'Usuário cadastrado com sucesso!',
                'response'  => $response
            ])->setStatusCode(201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged Out'
        ];
    }

    public function login(Request $request)
    {
        // $fields = $request->validate([
        //     'email' => 'required|string',
        //     'password' => 'required|string'
        // ]);

        // Check email
        $user = User::where('email', $request->email)->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
}
