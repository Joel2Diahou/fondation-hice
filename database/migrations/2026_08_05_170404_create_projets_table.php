<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('nom_complet');
            $table->string('email');
            $table->string('telephone');
            $table->string('ville');
            $table->string('etablissement');
            $table->enum('categorie', ['college', 'lycee', 'universite']);
            $table->string('classe_niveau');
            $table->string('nom_projet');
            $table->text('description_projet');
            $table->text('objectifs');
            $table->text('besoins')->nullable();
            $table->enum('statut', ['en_attente', 'valide', 'rejete', 'entretien'])->default('en_attente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
