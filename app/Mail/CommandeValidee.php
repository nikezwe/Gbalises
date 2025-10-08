<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\commande;

class CommandeValidee extends Mailable
{
    use Queueable, SerializesModels;

    public $commande;

    public function __construct(commande $commande)
    {
        $this->commande = $commande;
    }

    public function build()
    {
        return $this->subject('Nouvelle commande reçue - #' . $this->commande->id)
                    ->view('emails.commande_admin');
    }
}