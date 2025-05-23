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
        Schema::create('doleance_reunion', function (Blueprint $table) { 
    $table->id();
    $table->foreignId('doleance_id')->constrained()->onDelete('cascade');
    $table->foreignId('reunion_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doleance_reunion');
    }
};
