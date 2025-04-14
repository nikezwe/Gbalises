<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class balise extends Model
{
    use HasFactory;
    protected $table = 'balises';
    protected $fillable = [
        'nom','prix','image','typebalise_id'
    ];

    public function typebalise(){
        return $this->belongsTO(typebalise::class,'typebalise_id');
    }

    public function getslug(): string
    {
       return Str::slug($this->nom);
    }

    public function commandes(){
        return $this->hasMany(commande::class,'balise_id');
    }
}
