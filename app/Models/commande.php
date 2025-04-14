<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;
    protected $table = 'commandes';
    protected $fillable = [
        'user_id','balise_id','nom','prenom','email','telephone','quantite','etat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function balise()
    {
        return $this->belongsTo(balise::class,'balise_id');
    }
}
