<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('doleances', function (Blueprint $table) {
        $table->timestamp('dateSoumission')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
    });
}

public function down()
{
    Schema::table('doleances', function (Blueprint $table) {
        $table->timestamp('dateSoumission')->nullable()->change();
    });
}

};
