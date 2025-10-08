<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('factures', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // client
        $table->unsignedBigInteger('commande_id');
        $table->string('numero')->unique(); // numéro de facture
        $table->decimal('montant', 10, 2);
        $table->string('statut')->default('en attente'); // payé, en attente, annulé...
        $table->date('date_facture');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
