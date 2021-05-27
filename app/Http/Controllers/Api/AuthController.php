<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class AuthController extends Controller
{

    public function registrer(Request $request){

        $client = Client::create($request->all());        
        $client->fill(['password' => Hash::make($request->cpf)]);
        $client->save();
        return $client;
        
         }

    public function login(Request $request){

        $credentials = $request->only(['email', 'password']);


        if (!Auth::guard('client')->attempt($credentials)) {
            return response([
                'message' => 'Login inválido'
            ], 401);
        }
        
        $user = Auth::guard('client')->user();

        $token = $user->createToken("token")->plainTextToken;

        // $minutos = 60*24;

        // $cookie = cookie('jwt', $token, $minutos);

        return response([
            'message' => 'Success!',
            'token' => $token    
        ]);
    }

    public function user(Request $request){

        return $request->user();
    }

    public function logout( Request $request){

        $request->user()->currentAccessToken()->delete();
        return response([
            'message' => 'Token deletado com sucesso!'
        ]);
    }
}