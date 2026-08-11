<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programme_id')->constrained('programmes')->onDelete('cascade');
            $table->string('nom_complet');
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->integer('age')->nullable();
            $table->string('ville')->nullable();
            $table->text('motivation_fr')->nullable();
            $table->text('motivation_en')->nullable();
            $table->string('cv_url')->nullable();
            $table->enum('statut', ['en_attente', 'valide', 'rejete', 'entretien'])->default('en_attente');
            $table->date('date_candidature')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
