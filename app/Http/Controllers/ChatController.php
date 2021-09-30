<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function show(){
        $messages = Chat::where('offer_id', 1)->where('client_id', 1)->where('provider_id', 1)->get();
        return view('client.pages.message')->with('messages', $messages);
    }
}
