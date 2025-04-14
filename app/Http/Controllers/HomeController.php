<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\balise;

class HomeController extends Controller
{
    public function index(){
        $balise = balise::orderBy('created_at','desc')->get();
        return view('home',([
            'balises' => $balise
        ]));
    }
}
