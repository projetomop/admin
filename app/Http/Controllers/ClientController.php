<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search != "") {
            $clients = Client::where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            $clients = Client::all();
        }
        return view('client.pages.indexClient')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.pages.createClient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $validated = $request->validated();
        $client = Client::create($request->all());
        $client->fill(['password' => Hash::make($request->cpf)]);
        $client->save();

        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('client.pages.showClient')->with('client', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {

        return view('client.pages.editClient')->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        $validated = $request->validated();
        // $client->name = $request->name;
        // $client->cpf = $request->cpf;
        // $client->email = $request->email;
        // $client->telephone = $request->telephone;
        // $client->cep = $request->cep;
        // $client->street = $request->street;
        // $client->district = $request->district;
        // $client->city = $request->city;
        // $client->state = $request->state;
        $client->update($request->all());
        $client->save();

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index');
    }
}
