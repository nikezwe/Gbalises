<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommandeAdminMail extends Mailable
{
    use SerializesModels;

    public $commande;
    public $user;
    public $balises;

    public function __construct($commande, $user, $balises)
    {
        $this->commande = $commande;
        $this->user = $user;
        $this->balises = $balises;
    }

    public function build()
    {
        return $this->subject('Nouvelle commande reçue')
            ->view('emails.commande_admin');
    }
}
