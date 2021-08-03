<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
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
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
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
