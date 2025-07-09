<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = [
        'nom','prenom','email','telephone','adresse'
    ];

    public function commande(){
        return $this->hasMany(commande::class,'client_id');
    }
}
