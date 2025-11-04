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
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('action', 100)->nullable();
            $table->string('destination', 100)->nullable();
            $table->integer('km')->nullable();
            $table->integer('pourcentage_batterie')->nullable();
            $table->float('autonomie')->nullable();
            $table->string('type', 3)->nullable();
            $table->boolean('reset')->default(false);
            $table->float('distance')->nullable();
            $table->float('vitesse_moyenne')->nullable();
            $table->float('consommation_moyenne')->nullable();
            $table->float('consommation_totale')->nullable();
            $table->float('energie_recuperee')->nullable();
            $table->float('consommation_clim')->nullable();
            $table->string('commentaire', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('recharges', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->time('duree');
            $table->float('kw_charge');
            $table->float('prix_kwh')->default(0);
            $table->float('pu_chrg_kwh');
            $table->float('cout')->default(0);
            $table->integer('ratio_batterie')->nullable();
            $table->string('commentaire', 100)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recharges');
        Schema::dropIfExists('trajets');
    }
};
