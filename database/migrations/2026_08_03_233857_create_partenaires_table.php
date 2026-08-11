<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partenaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('logo_url')->nullable();
            $table->string('site_web')->nullable();
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->enum('type', ['partenaire', 'mecene', 'sponsor'])->default('partenaire');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partenaires');
    }
};
