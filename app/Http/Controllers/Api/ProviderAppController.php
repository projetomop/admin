<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderAppController extends Controller
{
    //
    public function editProviderProfile(Request $request, $id){
        $provider = Provider::where('id', $id)->firstOrFail();
        $provider->name = $request->name;
        $provider->telephone = $request->telephone;
        $provider->cep = $request->cep;
        $provider->street = $request->street;
        $provider->district = $request->district;
        $provider->city = $request->city;
        $provider->state = $request->state;
        $provider->curriculum = $request->curriculum;
        $provider->update();
        
        return  response([
                'message' => 'Success!',
                'user' => $provider,
            ], 200);
    }
}
