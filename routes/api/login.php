<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;


Route::post('login', function (Request $request) {
$credentials = $request->only('email', 'password');

if (Auth::guard('client')->attempt($credentials)) {

return Client::where('email', '=', $request->email)->get();
}

return false;


});