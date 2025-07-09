<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balise;
use App\Http\Requests\BaliseRequest;
use App\Models\typebalise;

class BaliseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Accès refusé');
        }
        $balises = Balise::with('typebalise')->get();
        return view('admin.balises.index',compact('balises'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Accès refusé');
        }
        return view('admin.balises.form',[
            'balises'=> new Balise(),
            'typebalises' => typeBalise::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BaliseRequest $request)
{
    if (auth()->user()->role !== 'admin') {
        abort(403, 'Accès refusé');
    }
    $data = $request->validated(); // Récupère les données validées

    // Vérifiez si une image est envoyée
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('uploads', 'public'); // Stocke l'image dans storage/app/public/uploads
        $data['image'] = $imagePath; // Enregistre le chemin dans la base de données
    }

    Balise::create($data);

    return to_route('admin.balise.index')->with('success', 'Balise ajoutée avec succès');
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Balise $balise)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Accès refusé');
        }
        return view('admin.balises.form',[
            'balises'=> $balise,
            'typebalises' => typeBalise::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BaliseRequest $request, Balise $balise)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Accès refusé');
        }
        $data = $request->validated(); // Récupère les données validées
    
        // Vérifiez si une image est envoyée
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('uploads', 'public'); // Stocke l'image dans storage/app/public/uploads
            $data['image'] = $imagePath; // Enregistre le chemin dans la base de données
        }
    
        $balise->update($data);
    
        return to_route('admin.balise.index')->with('success', 'Balise modifiée avec succès');
    }
     /** Remove the specified resource from storage.
     */
    public function destroy(Balise $balise)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Accès refusé');
        }
        $balise->delete();
        return to_route('admin.balise.index')->with('success', 'Balise supprimée avec succès');
    }
    public function show(string $slug, Balise $balise)
    {
        $expectedSlug = $balise->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('balise.show', ['slug' => $expectedSlug, 'balise' => $balise]);
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
            'balise' => $balise,
            'cartItems' => $cartItems,
            'totalItems' => $totalItems,
            'total' => $total,
        ]);
    }
}
