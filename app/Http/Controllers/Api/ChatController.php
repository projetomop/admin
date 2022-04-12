<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\Provider;
use Illuminate\Support\Facades\DB;

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

    public function showChat($client){
        $i=0;
        // $pro = Chat::where('client_id', $client)->selectRaw('DISTINCT provider_id, offer_id')->with('provider')->get();
        $pro = DB::table('chats')
        ->where('client_id', $client)
        ->join('providers', 'providers.id', '=', 'chats.provider_id')
        ->join('profissions', 'profissions.id', '=','providers.profission_id')
        ->select('providers.id as provider_id', 'providers.name', 'providers.profission_id', 'profissions.description', 'chats.offer_id')
        ->distinct()
        ->get();
       
        return response()->json($pro, 200);
    }

    public function showChatProvider($provider){
        $i=0;
        // $pro = Chat::where('client_id', $client)->selectRaw('DISTINCT provider_id, offer_id')->with('provider')->get();
        $pro = DB::table('chats')
        ->where('provider_id', $provider)
        ->join('clients', 'clients.id', '=', 'chats.client_id')
        ->join('services', 'services.client_id', '=', 'chats.client_id')
        ->select('clients.id as client_id', 'clients.name', 'chats.offer_id', 'services.description')
        ->distinct()
        ->get();
       
        return response()->json($pro, 200);
    }
}
