<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('demandes_partenaires', function (Blueprint $table) {
            $table->id();
            $table->string('entreprise');
            $table->string('nom_contact');
            $table->string('email');
            $table->string('telephone');
            $table->string('ville');
            $table->text('message');
            $table->enum('type_partenariat', ['sponsor', 'mecene', 'partenaire', 'autre']);
            $table->boolean('traite')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('demandes_partenaires');
    }
};
