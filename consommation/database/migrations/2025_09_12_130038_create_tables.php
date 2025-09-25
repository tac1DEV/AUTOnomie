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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->timestamps();
        });
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date')->nullable();
            $table->string('action')->nullable();
            $table->string('destination')->nullable();
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
            $table->foreignId('id_commentaire')->nullable()->constrained('commentaires');
        });

        Schema::create('recharges', function (Blueprint $table) {
            $table->id();
            $table->integer('duree');
            $table->integer('kw_charge');
            $table->integer('prix_kwh');
            $table->integer('pu_charge_kwh');
            $table->integer('cout');
            $table->integer('pourcentage');
            $table->foreignId('id_commentaire')->nullable()->constrained('commentaires');
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
        Schema::dropIfExists('commentaires');
    }
};
