<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\balise;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class balisescontroller extends Controller
{
    public function index(SearchRequest $request)
    {
        $query = balise::query();
        if($request->has('prix')){
            $query->where('prix','<=',$request->input('prix'));
        }
        return view('balise.index',
        [
            'balises' => $query->paginate(3)
        ]);
    }

    public function show(string $slug, balise $balise)
    {
        $expectedSlug = $balise->getSlug();
        if($slug !== $expectedSlug){
            return to_route('balise.show',['slug' => $expectedSlug,'balise'=>$balise]);
        }
        // Ajout du panier utilisateur
        $cartItems = [];
        $totalItems = 0;
        $total = 0;
        if (auth()->check()) {
            $cartItems = \App\Models\Cart::where('user_id', auth()->id())
                ->with('balise.typebalise')
                ->get();
            $totalItems = \App\Models\Cart::getTotalItems(auth()->id());
            $total = \App\Models\Cart::getTotalPrice(auth()->id());
        }
        return view('balise.show', [
            'balise'=>$balise,
            'cartItems' => $cartItems,
            'totalItems' => $totalItems,
            'total' => $total,
        ]);
    }

    public function commande(balise $balise, ContactRequest $request)
    {
        Log::info('Balise ID: ' . $balise->id);
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour passer une commande.');
        }

        $data = $request->validated();

        $commande = $balise->commandes()->create([
            'user_id' => auth()->id(),
            'balise_id' => $balise->id,
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'quantite' => $data['quantite'],
            'etat' => 'en attente',
        ]);

        return redirect()->route('balise.show', ['slug' => $balise->getSlug(), 'balise' => $balise->id])
        ->with('success', 'Votre commande a bien été reçue.');
    
        Mail::send(new ContactMail([
            'balise' => $balise,
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'quantite' => $data['quantite'],
            
        ]));
    
        return back();
    } 
}
