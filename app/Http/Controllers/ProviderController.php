<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Support\Facades\Hash;
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
        return view('provider.pages.indexProvider')->with('provider', $provider);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provider.pages.createProvider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provider=Provider::create($request->all());
        $provider->fill(['password' => Hash::make($request->cpf)]);
        $provider->save();

        return redirect()->route('provider.indexProvider');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return view('provider.pages.showProvider')->with('provider', $provider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('provider.pages.editProvider')->with('provider', $provider);
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

        return redirect()->route('provider.index');
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
        return redirect()->route('provider.index');
    }
}
