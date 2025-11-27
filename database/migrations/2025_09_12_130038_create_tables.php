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
        Schema::create('batteries', function (Blueprint $table) {
            $table->id();
            $table->float('pourcentage')->default(0);
        });
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('action', 100)->nullable();
            $table->string('destination', 100)->nullable();
            $table->integer('km')->nullable();
            $table->foreignId('batterie_id')->constrained('batteries');
            $table->float('autonomie')->nullable();
            $table->string('type', 3)->nullable();
            $table->boolean('reset')->default(false);
            $table->float('distance')->nullable();
            $table->float('vitesse_moyenne')->nullable();
            $table->float('consommation_moyenne')->nullable();
            $table->float('consommation_totale')->nullable();
            $table->float('energie_recuperee')->nullable();
            $table->float('consommation_clim')->nullable();
        });

        Schema::create('recharges', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('action', 100);
            $table->string('destination', 100);
            $table->integer('km');
            $table->float('autonomie')->nullable();
            $table->string('type', 3);
            $table->string('reset', 3)->nullable();
            $table->time('duree');
            $table->float('kw_charge');
            $table->float('prix_kwh')->default(0);
            $table->float('pu_chrg_kwh');
            $table->float('cout')->default(0);
            $table->foreignId('batterie_id')->constrained('batteries');
            $table->string('commentaire', 100)->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recharges');
        Schema::dropIfExists('trajets');
        Schema::dropIfExists('batterie');
    }
};
