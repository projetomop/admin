<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function show($offer, $client, $provider){
        $messages = Chat::where('offer_id', $offer)->where('client_id', $client)->where('provider_id', $provider)->get();
        return response()->json($messages, 200);
    }
    public function store(Request $request){
        $message = Chat::create($request->all());
        return response()->json($message, 200);

    }
}
