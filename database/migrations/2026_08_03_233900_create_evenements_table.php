<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('titre_fr');
            $table->string('titre_en');
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->datetime('date_debut');
            $table->datetime('date_fin')->nullable();
            $table->string('lieu')->nullable();
            $table->string('image_url')->nullable();
            $table->string('lien_inscription')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
