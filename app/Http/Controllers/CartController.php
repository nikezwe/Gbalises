<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\balise;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Afficher le panier de l'utilisateur connecté
     */ 
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())
            ->with('balise.typebalise')
            ->get();

        $total = Cart::getTotalPrice(Auth::id());
        $totalItems = Cart::getTotalItems(Auth::id());

        return view('cart.index', compact('cartItems', 'total', 'totalItems'));
    }

    /**
     * Ajouter un produit au panier
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'balise_id' => 'required|exists:balises,id',
    //         'quantite' => 'required|integer|min:1|max:99'
    //     ]);

    //     $balise = balise::findOrFail($request->balise_id);

    //     // Vérifier si le produit est actif (si vous avez cette colonne)
    //     // if (!$balise->is_active) {
    //     //     return back()->with('error', 'Ce produit n\'est plus disponible.');
    //     // }

    //     // Vérifier le stock si vous avez cette colonne
    //     // if (isset($balise->stock_quantity) && $balise->stock_quantity < $request->quantite) {
    //     //     return back()->with('error', 'Stock insuffisant. Stock disponible: ' . $balise->stock_quantity);
    //     // }

    //     try {
    //         Cart::addToCart(Auth::id(), $request->balise_id, $request->quantite);
            
    //         return back()->with('success', 'Produit ajouté au panier avec succès !');
    //     } catch (\Exception $e) {
    //         return back()->with('error', 'Erreur lors de l\'ajout au panier.');
    //     }
    // }

    /**
     * Mettre à jour la quantité d'un produit dans le panier
     */
    public function update(Request $request, Cart $cart)
    {
        // Vérifier que l'item appartient à l'utilisateur connecté
        if ($cart->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé.');
        }

        $request->validate([
            'quantite' => 'required|integer|min:1|max:99'
        ]);

        // Vérifier le stock si vous avez cette colonne
        // if (isset($cart->balise->stock_quantity) && $cart->balise->stock_quantity < $request->quantite) {
        //     return back()->with('error', 'Stock insuffisant. Stock disponible: ' . $cart->balise->stock_quantity);
        // }

        $cart->update(['quantite' => $request->quantite]);

        return back()->with('success', 'Quantité mise à jour avec succès !');
    }

    /**
     * Supprimer un produit du panier
     */
    public function destroy(Cart $cart)
    {
        // Vérifier que l'item appartient à l'utilisateur connecté
        if ($cart->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé.');
        }

        $cart->delete();

        return back()->with('success', 'Produit retiré du panier.');
    }

    /**
     * Vider complètement le panier
     */
    public function clear()
    {
        Cart::clearCart(Auth::id());

        return back()->with('success', 'Panier vidé avec succès.');
    }

    /**
     * Obtenir le nombre d'items dans le panier (pour l'affichage dans la navbar)
     */
    public function getCartCount()
    {
        if (Auth::check()) {
            return Cart::getTotalItems(Auth::id());
        }
        return 0;
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $cartItems = $request->input('cart');

        // Nettoyer le panier actuel de l'utilisateur (optionnel)
        Cart::where('user_id', $user->id)->delete();

        foreach ($cartItems as $item) {
            Cart::create([
                'user_id' => $user->id,
                'balise_id' => $item['id'], // ou autre clé selon ta base
                'quantite' => $item['quantite'] ?? $item['quantity'] ?? 1,
            ]);
        }

        return response()->json(['success' => true]);
    }
}