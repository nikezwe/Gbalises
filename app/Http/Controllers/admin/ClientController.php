<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client;
use App\Requests\ClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.client.index',[
            'clients'=> client::OrderBy('created_at','desc')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = new client();
        return view('admin.client.form',[
            'clients' => $client
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $client = client::create($request->validated());
        return to_route('admin.client.index')->with('success','client bien cree');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client)
    {
        return view('admin.client.form',[
            'clients'=> $client
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, client $client)
    {
        $client->update($request->validated());
        return to_route('admin.client.index')->with('success','client bien modifie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client)
    {
        return to_route('admin.client.index')->with('success','client bien supprime');
    }
}
