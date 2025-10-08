<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Commande;
use App\Models\Facture;
use App\Models\Balise;

class AdminController extends Controller
{
     public function index()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalCommandes' => Commande::count(),
            'totalFactures' => Facture::count(),
            'totalBalises' => Balise::count(),
        ]);
    }
}
