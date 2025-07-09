<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail; 
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        Contact::create($data);

        Mail::to('admin@example.com')->send(new ContactMail($data));

        return redirect()->route('contact.create')->with('success', 'Votre message a été envoyé avec succès.');
    }
}