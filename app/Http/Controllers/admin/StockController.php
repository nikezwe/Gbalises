<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balise;


class StockController extends Controller
{
    public function index()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Accès refusé');
        }
        $balises = Balise::all();
        return view('admin.stock.index', compact('balises'));
    }

    public function update(Request $request, Balise $balise)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Accès refusé');
        }
        $request->validate(['stock' => 'required|integer|min:0']);
        $balise->stock = $request->stock;
        $balise->save();
        return back()->with('success', 'Stock mis à jour');
    }
}

