<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposal = Proposal::where('service_id', 1)->with('service')->get();
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
        $cont = Proposal::where('service_id', 1)->get()->count();
        if ($cont >= 3) {
            return response()->json([
                'cont' => $cont,
                'message' => 'Excedeu o limite de propostas'
            ], 200);
        } else {
            return response()->json([
                'cont' => $cont,
                'message' => 'Pode cadastrar'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        //
    }
}
