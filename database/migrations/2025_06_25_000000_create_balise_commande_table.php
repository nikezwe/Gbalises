<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('balise_commande', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_id')->constrained('commandes')->cascadeOnDelete();
            $table->foreignId('balise_id')->constrained('balises')->cascadeOnDelete();
            $table->integer('quantite')->default(1);
            $table->decimal('prix', 30,2);// Prix unitaire de la balise au moment de la commande
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('balise_commande');
    }
};
