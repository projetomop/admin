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

        Client::create($request->all());
        //$client->fill(['password' => Hash::make($request->cpf)]);
        //$client->password = $request->cpf;
        //return $client;
                
        // return Client::create([
        //     'name' => $request->input(key:'name'),
        //     'cpf' => $request->input(key:'cpf'),
        //     'email' => $request->input(key:'email'),
        //     'telephone' => $request->input(key:'telephone'),
        //     'cep' => $request->input(key:'cep'),
        //     'street' => $request->input(key:'street'),
        //     'district' => $request->input(key:'district'),
        //     'city' => $request->input(key:'city'),
        //     'state' => $request->input(key:'state'),
        //     'image' => $request->input(key:'image'),
        //     'password' => Hash::make($request->input(key:'password')),
        // ]);

         }

    public function login(Request $request){

        $credentials = $request->only(['email', 'password']);


        if (!Auth::guard('client')->attempt($credentials)) {
            return response([
                'message' => 'Login inválido'
            ], status: 401);
        }
        
        $user = Auth::guard('client')->user();

        $token = $user->createToken("token")->plainTextToken;

        $minutos = 60*24;

        $cookie = cookie('jwt', $token, $minutos);

        //$token = $request->user()->createToken("token");

        return response([
            $user
        ])->withCookie($cookie);
    }

    public function user(){

        return Auth::user();
    }

    public function logout( Request $request){
        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'Deslogado'
        ])->withCookie($cookie);
    }
    

    // /**
    //  * Get a JWT via given credentials.
    //  *
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function login(Request $request)
    // {
    //     $credentials = $request->only(['email', 'password']);

    //     if (!$token = auth( guard: 'api' )->attempt($credentials)) {
    //         return response()->json(['error' => 'Unauthorized'], status: 401);
    //     }

    //     return $this->respondWithToken($token); 
        
    // }

    // /**
    //  * Get the token array structure.
    //  *
    //  * @param  string $token
    //  *
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // protected function respondWithToken($token)
    // {
    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'bearer',
    //         'expires_in' => auth( guard: 'api' )->factory()->getTTL() * 60
    //     ]);
    // }
}