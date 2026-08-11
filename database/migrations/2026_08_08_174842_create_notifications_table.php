<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projet_id')->constrained('projets')->onDelete('cascade');
            $table->string('type'); // email, whatsapp, sms
            $table->string('destinataire');
            $table->text('message');
            $table->enum('statut', ['envoye', 'erreur', 'en_attente'])->default('en_attente');
            $table->json('reponse')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
