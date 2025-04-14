<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typebalise extends Model
{
    use HasFactory;
    protected $table = 'typebalises';
    protected $fillable = [
        'nom'];

    public function balises(){
        return $this ->hasMany(balise::class,'typebalise_id');
    }

}
