<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('temoignages', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('photo_url')->nullable();
            $table->text('texte_fr');
            $table->text('texte_en');
            $table->string('fonction')->nullable();
            $table->boolean('est_visible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temoignages');
    }
};
