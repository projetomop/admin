<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Client;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Result;
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

    public function create_token(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Client::where('email', $request->email)->first();

        if(! $user || ! Hash::check($request->password, $user->password)){
            return [
                'error' => 'The provided credentials are incorrect.'
            ];
        }

        $token = $user->createToken("token")->plainTextToken;

        return response([
            'message' => 'Success!',
            'token' => $token    
        ]);
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

        return response([
            'message' => 'Success!',
            'token' => $token    
        ]);
    }

    public function user(Request $request){

        return $request->user();
    }

    public function logout(Request $request){
        // dd($request->user());
        // $request->user()->tokens()->delete();
        return response([
            // 'message' => 'Token deletado com sucesso!'
            'message' => $request->user()
        ]);
    }
}