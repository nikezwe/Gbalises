<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'balise_id',
        'quantite',
    ];

    public function balise()
    {
        return $this->belongsTo(Balise::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getTotalItems($userId)
    {
        return static::where('user_id', $userId)->sum('quantite');
    }

    public static function getTotalPrice($userId)
    {
        return static::where('user_id', $userId)
            ->with('balise')
            ->get()
            ->sum(function ($cart) {
                return $cart->quantite * ($cart->balise->prix ?? 0);
            });
    }
}