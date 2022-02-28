<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Offer;

class ScheduleController extends Controller
{
    public function getAgenda($idClient){
        $query = Schedule::where('client_id', $idClient)
        ->with('provider')
        ->with('service')
        ->get();
        return response()->json($query,200);
    }

    public function postAgenda(Request $request){
        $offer=Offer::find($request->idProposal);
        $query = Schedule::create([
            'service_id' => $offer->service_id,
            'provider_id' => $offer->provider_id,
            'client_id' => $request->idClient,
            'date' => $request->date,
            'hour' => $request->hour,
        ]);
        if($query){
            $offer->status = "accept";
            $offer->save();
        }

        return response()->json([
            'message' => 'Agendamento realizado com sucesso'
        ],200);
    }
}
