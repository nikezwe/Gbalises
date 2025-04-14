<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('commandes.balise')->paginate(10);

        return view('users.index', [
            'users' => $users
        ]);
    }
}
