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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');

            $table->string('tel');
            $table->string('email')->nullable();

            $table->text('adresse')->nullable();

            $table->string('entreprise')->nullable();
            $table->string('poste')->nullable();

            $table->foreignId('groupe_id')
                  ->nullable()
                  ->constrained('groupes')
                  ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
