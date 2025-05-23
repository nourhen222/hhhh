<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('commission_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->enum('statut', ['travail', 'congé'])->default('travail'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commission_members');
    }
};
