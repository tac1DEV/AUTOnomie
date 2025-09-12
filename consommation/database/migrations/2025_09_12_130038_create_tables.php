<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voiture', function (Blueprint $table) {
            $table->id();
            $table->string('manufacturer');
            $table->string('model');
            $table->integer('km');
            $table->integer('charge_batterie');
            $table->integer('autonomie');
        });
        Schema::create('commentaire', function (Blueprint $table) {
            $table->id();
            $table->text('message');
        });
        Schema::create('trajet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_voiture')->constrained('voiture');
            $table->dateTime('date');
            $table->string('type_trajet');
            $table->string('destination');
            $table->integer('vitesse_moyenne');
            $table->integer('consommation_moyenne');
            $table->integer('energie_recuperee');
            $table->integer('consommation_climatisation');
            $table->foreignId('id_commentaire')->constrained('commentaire');
        });
        Schema::create('recharge', function (Blueprint $table) {
            $table->id();
            $table->integer('duree');
            $table->integer('kw_charge');
            $table->integer('prix_kwh');
            $table->integer('pu_charge_kwh');
            $table->integer('cout');
            $table->integer('pourcentage');
            $table->foreignId('id_commentaire')->constrained('commentaire');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recharge');
        Schema::dropIfExists('trajet');
        Schema::dropIfExists('commentaire');
        Schema::dropIfExists('voiture');
    }
};
