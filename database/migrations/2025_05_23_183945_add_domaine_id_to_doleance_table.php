<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('doleance', function (Blueprint $table) {
        $table->unsignedBigInteger('domaines_id')->nullable()->after('id'); // ou après une autre colonne que tu préfères
        // Si tu veux une clé étrangère vers la table domaines :
        $table->foreign('domainse_id')->references('id')->on('domaines')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('doleance', function (Blueprint $table) {
        $table->dropForeign(['domaines_id']);
        $table->dropColumn('domaines_id');
    });
}

};
