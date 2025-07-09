<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\typebalise;
use App\Http\Requests\TypeBaliseRequest;

class TypeBaliseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Accès refusé');
        }
        return view('admin.typebalise.index',
         ['typebalises' => typebalise::paginate(10)]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Accès refusé');
        }
        return view('admin.typebalise.form',[
            'typebalises'=> new typebalise()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeBaliseRequest $request)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Accès refusé');
        }
        $typebalise = typebalise::create($request->validated());
        return to_route('admin.typebalise.index')->with('success', 'type ajoutée avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(typebalise $typebalise)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Accès refusé');
        }
        return view('admin.typebalise.form',[
            'typebalises'=> $typebalise
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(TypeBaliseRequest $request, typebalise $typebalise)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Accès refusé');
        }
        $typebalise->update($request->validated());
        return to_route('admin.typebalise.index')->with('success', 'type modifiée avec succès');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(typebalise $typebalise)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Accès refusé');
        }
        $typebalise->delete();
        return to_route('admin.typebalise.index')->with('success', 'type supprimée avec succès');
    }
}
