<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\commande;
use App\Http\Requests\CommandeRequest;
use App\Models\balise;
use App\Models\balisecommande;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommandeController extends Controller
{
    public function index()
    {
        // Admin voit toutes les commandes de tous les utilisateurs
        $commandes = commande::with(['balise', 'user'])->paginate(10);
        $user = auth()->user();
        return view('admin.commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $commande = new commande();
        return view('admin.commandes.form', [
            'commande' => $commande,
            'balise' => balise::pluck('nom', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // dd($request->all());
        // Valider les données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // Validation de la structure du panier
            'balises' => 'required|json',
        ]);

        $user = Auth::user();

        // Créer la commande
        $commande = Commande::create([
            'user_id' => $user->id,
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'etat' => 'en attente', // Commande par défaut en attente
        ]);

        // Récupérer les données du panier depuis le champ caché 'balises' envoyé par le formulaire
        $cartItems = json_decode($validated['balises'], true);

        // Ajouter les éléments du panier dans la table `commande_balise`
        foreach ($cartItems as $item) {
              balisecommande::create([
                'commande_id' => $commande->id,
                'balise_id' => $item['balise_id'], // ID de la balise dans le panier
                'quantite' => $item['quantite'],
                'prix' => $item['balise']['prix'], // Prix unitaire de la balise
            ]);
        }

        Cart::where('user_id', $user->id)->delete();

        // retour a ls home page route home
        return redirect()->route('home')->with('success', 'Commande passée avec succès.');

    
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(commande $commande)
    {
        return view('admin.commandes.form', [
            'commande' => $commande,
            'balise' => balise::pluck('nom', 'id'), // Corrigé: nom au lieu de name pour cohérence
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommandeRequest $request, commande $commande)
    {
        $commande->update($request->validated());
        $commande->balise()->sync($request->validated()); // Corrigé: sync au lieu de syc
        
        return to_route('admin.commande.index')->with('success', 'Commande modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(commande $commande)
    {
        $commande->delete(); // Ajouté: suppression effective de la commande
        return to_route('admin.commande.index')->with('success', 'Commande supprimée');
    }
}