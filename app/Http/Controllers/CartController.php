<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\balise;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart()->with('balise')->get();
        return view('cart.index',compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'balise_id' => 'required|exists:balises,id',
            'quantite' => 'required|integer|min:1',
        ]);
        $cart = Cart:: updateOrCreate(
            [
                'user_id' => auth()->id(),
                'balise_id'=>$request->balise_id,
            ],
            [
                'quantite' => $request->quantite,
             ]
            );
            return redirect()->route('cart.index')->with('success','Balise ajoute au panier');
    }

    public function destroy(Cart $cart)
    {
        $this->autorize('delete',$cart);
        $cart->delete();

        return redirect()->route('cart.index')->with('balise supprime du panier');
    }
}
