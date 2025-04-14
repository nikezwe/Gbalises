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
        $balises = Balise::with('typebalise')->get();
        return view('admin.balises.index',compact('balises'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        $data = $request->validated(); // Récupère les données validées
        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if($image === null && !$image->getError())
        {
             $data['image'] = $image->store('blog','public');
        }
        Balise::create($data);
    
        return view('admin.balises.index', [
            'balises' => Balise::with('typebalise')->get(),
        ])->with('success', 'Balise ajoutée avec succès');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Balise $balise)
    {
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
         $data = $request->validated(); // Récupère les données validées
        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if($image === null && !$image->getError())
        {
             $data['image'] = $image->store('blog','public');
        }
         $balise->update($data); // Met à jour la balise avec les données validées
     
         return to_route('admin.balise.index')->with('success', 'Balise modifiée avec succès');
     }

     /** Remove the specified resource from storage.
     */
    public function destroy(Balise $balise)
    {
        $balise->delete();
        return to_route('admin.balise.index')->with('success', 'Balise supprimée avec succès');
    }
}
