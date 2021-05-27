<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{

    public function registrer(Request $request){

        $client = Client::create($request->all());        
        $client->fill(['password' => Hash::make($request->cpf)]);
        $client->save();
        return $client;
        
         }

    public function login(Request $request){
        $request->validate ([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Client::where('email', $request->email)->first();
        if(! $user || ! Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['Credenciais incorretas'],
            ]);
        }

        return $user->createToken("token")->plainTextToken;
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