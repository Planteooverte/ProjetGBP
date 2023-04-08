<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('subirs', function (Blueprint $table) {
            $table->id();
            $table->year('Annee')->nullable(); 
            $table->foreignId('idUser');
            $table->foreignId('idInflation');
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idInflation')->references('id')->on('inflations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subirs');
    }
};
