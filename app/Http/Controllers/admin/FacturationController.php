<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Commande;
use Illuminate\Support\Str;

class FacturationController extends Controller
{
    public function index()
    {
        $factures = Facture::with(['user', 'commande'])->latest()->get();
        return view('admin.facture.index', compact('factures'));
    }

    public function create()
    {
           $commandes = Commande::with('user')->get();
            return view('admin.facture.form', compact('commandes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'commande_id' => 'required|exists:commandes,id',
            'montant' => 'required|numeric|min:0',
            'date_facture' => 'required|date',
            'statut' => 'required|in:en attente,payée,annulée',
        ]);

        $commande = Commande::findOrFail($request->commande_id);

        Facture::create([
            'user_id' => $commande->user_id,
            'commande_id' => $commande->id,
            'numero' => 'FAC-' . strtoupper(Str::random(6)),
            'montant' => $request->montant,
            'statut' => $request->statut,
            'date_facture' => $request->date_facture,
        ]);

        return redirect()->route('admin.facture.index')->with('success', 'Facture créée.');
    }

    public function show(Facture $facturation)
    {
        return view('admin.facture.show', compact('facturation'));
    }

    public function edit(Facture $facturation)
    {
        $facture = $facturation; // alias pour la vue
        return view('admin.facture.form', compact('facture'));
    }

    public function update(Request $request, Facture $facturation)
    {
        $request->validate([
            'montant' => 'required|numeric|min:0',
            'date_facture' => 'required|date',
            'statut' => 'required|in:en attente,payée,annulée',
        ]);

        $facturation->update([
            'montant' => $request->montant,
            'date_facture' => $request->date_facture,
            'statut' => $request->statut,
        ]);

        return redirect()->route('admin.facture.index')->with('success', 'Facture modifiée.');
    }

    public function destroy(Facture $facturation)
    {
        $facturation->delete();
        return redirect()->route('admin.facture.index')->with('success', 'Facture supprimée.');
    }
}