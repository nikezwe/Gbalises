<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\balise;

class HomeController extends Controller
{
    public function index(){
        $balises = balise::orderBy('created_at','desc')->paginate(8); // 8 produits par page
        return view('home', [
            'balises' => $balises
        ]);
    }
}
