<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAppCrontroller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function editClientProfile(Request $request, $id){
        // $user = $request->user();
        $client = Client::where('id', $id)->firstOrFail();

        // if($user->cpf != $client->cpf){
        //     return response([
        //         'message' => 'Você não não permissão para essa ação.'
        //     ], 401);
        // }
            $client->name = $request->name;
            $client->telephone = $request->telephone;
            $client->cep = $request->cep;
            $client->street = $request->street;
            $client->district = $request->district;
            $client->city = $request->city;
            $client->state = $request->state;
            $client->update();
        
        return  response([
                'message' => 'Success!',
                'user' => $client,
            ], 200);
    }
}
