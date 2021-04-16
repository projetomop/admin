<?php

namespace App\Http\Controllers;

use App\Models\Profission;
use Illuminate\Http\Request;

class ProfissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profissions = Profission::all();
        return view("profission.pages.indexProfission")->with(['profissions' => $profissions]);
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
        $profission = Profission::create($request->all());
          return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profission  $profission
     * @return \Illuminate\Http\Response
     */
    public function show(Profission $profission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profission  $profission
     * @return \Illuminate\Http\Response
     */
    public function edit(Profission $profission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profission  $profission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profission $profission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profission  $profission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profission $profission)
    {
        //
    }
}
