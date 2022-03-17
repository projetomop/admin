<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Service;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $proposal = Offer::where('service_id', $request->service_id)->with('service')->get();
        return  response()->json($proposal, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cont = Offer::where('service_id', $request->service_id)->get()->count();
        if ($cont >= 3) {
            return response()->json([
                'cont' => $cont,
                'message' => 'Excedeu o limite de propostas'
            ], 200);
        } else {
            $cont_ofert = Offer::where('service_id', $request->service_id)->where('provider_id', $request->provider_id)->get()->count();   
            if($cont_ofert == 0){
                $offer = Offer::create($request->all());
                if($offer){
                $alterStatus = Service::find($request->service_id);
                $alterStatus->status = "progress";
                $alterStatus->save();
                }
                return response()->json([
                    'cont' => $cont,
                    'message' => 'Proposta cadastrada com sucesso',
                    'offer_prestador' => $cont_ofert,
                    'request' => $request->all()
                ], 200);
            

            }else{
                return response()->json([
                    'message' => 'Você ja possui proposta cadastrada',
                ], 200);
            }
           
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposal = Offer::find($id);
        return response()->json([
            'proposal' => $proposal,
            'provider' => $proposal->provider
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit($offer, $action)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update($offer, Request $request)
    {
        if($request->action == 'reject'){
            $query = Offer::find($offer);
            $query->status = "reject";
            $query->save();
            return response()->json($query, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
