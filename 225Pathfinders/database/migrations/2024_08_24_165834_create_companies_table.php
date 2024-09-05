<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de l'entreprise
            $table->text('description'); // Description de l'entreprise
            $table->string('location'); // Localisation (adresse) de l'entreprise
            $table->decimal('latitude', 10, 7); // Latitude pour la géolocalisation
            $table->decimal('longitude', 10, 7); // Longitude pour la géolocalisation
            $table->string('contacts'); // Détails de contact (téléphone, email, etc.)
            $table->json('photos')->nullable(); // Champ JSON pour stocker la galerie photo
            $table->unsignedBigInteger('manager_id')->nullable(); // ID de l'utilisateur manager
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
