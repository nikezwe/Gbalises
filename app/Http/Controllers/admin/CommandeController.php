<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\commande;
use App\Requests\CommandeRequest;
use App\Models\balise;
use App\Models\client;

class CommandeController extends Controller
{

public function index($userId)
{
    $commandes = commande::where('user_id', $userId)->with('balise')->paginate(10);
    return view('admin.commandes.index', compact('commandes'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $commande = new commande();
        return view('admin.commandes.form',
        [
            'commande'=> $commande,
            'balise'=> balise::pluck('nom','id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CmmandeRequest $request)
    {
        $commande = commande::create($request->validated());
        $commande->balise()->syc($request->validated());
        return to_route('admin.commande.index')->with('success','commande cree');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(commande $commande)
    {
        return view('admin.commandes.form',[
            'commande'=> $commande,
            'balise'=> balise::pluck('name','id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommandeRequest $request, commande $commande)
    {
        $commande->update($request->validated());
        $commande->balise()->syc($request->validated());
        return to_route('admin.commande.index')->with('success','commade modiie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(commande $commande)
    {
        return to_route('admin.commande.index')->with('success','commande bien supprime');
    }
}
