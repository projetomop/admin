<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provider = Provider::all();
        return view('provedor.pages.index')->with('provider', $provider);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provedor.forms.provedor_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provider = new Provider();
        $provider->name = $request->name;
        $provider->cpf = $request->cpf;
        $provider->email = $request->email;
        $provider->telephone = $request->telephone;
        $provider->street = $request->street;
        $provider->district = $request->district;
        $provider->city = $request->city;
        $provider->state = $request->state;

        $provider->save();

        return redirect()->route(route:'provider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return view('provedor.pages.showProvider')->with('provider', $provider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('provedor.pages.editProvider')->with('provider', $provider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $provider->name = $request->name;
        $provider->cpf = $request->cpf;
        $provider->email = $request->email;
        $provider->telephone = $request->telephone;
        $provider->street = $request->street;
        $provider->district = $request->district;
        $provider->city = $request->city;
        $provider->state = $request->state;

        $provider->save();

        return redirect()->route(route:'provider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route(route:'provider.index');
    }
}
