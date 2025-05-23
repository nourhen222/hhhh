<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doleances', function (Blueprint $table) {
            $table->id('id');
            $table->string('titre');
            $table->text('description');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Assure-toi que cette ligne est présente
            $table->date('dateSoumission');
            $table->enum('etat', ['soumise', 'en cours', 'traitée', 'rejetée'])->default('soumise');
            $table->timestamps();
        
        });
        
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doleances');
    }
};
