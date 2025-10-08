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
use App\Mail\CommandeValidee;

class CommandeController extends Controller
{
    // ... autres méthodes ...

    public function store(Request $request)
    {
        // Validation existante...
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'balises' => 'required|json',
        ]);

        $user = Auth::user();

        // Créer la commande
        $commande = Commande::create([
            'user_id' => $user->id,
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'etat' => 'en attente',
        ]);

        // Ajouter les balises comme avant...
        $cartItems = json_decode($validated['balises'], true);

        foreach ($cartItems as $item) {
            balisecommande::create([
                'commande_id' => $commande->id,
                'balise_id' => $item['balise_id'],
                'quantite' => $item['quantite'],
                'prix' => $item['balise']['prix'],
            ]);
        }

        // Vider le panier
        Cart::where('user_id', $user->id)->delete();

        // NOUVEAU : Envoyer l'email à l'admin
        $commande->load('balisecommandes.balise');
        $adminEmail = 'admin@votre-site.com'; // Remplacez par l'email de l'admin
        Mail::to($adminEmail)->send(new CommandeValidee($commande));

        return redirect()->route('home')->with('success', 'Commande passée avec succès.');
    }

    // ... autres méthodes ...
}