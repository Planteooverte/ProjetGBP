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
        Schema::create('users_inflations', function (Blueprint $table) {
            $table->id();
            $table->year('Annee'); 
            $table->foreignId('user_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            // $table->foreign('idUser')->references('id')->on('users');
            $table->foreignId('inflation_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            // $table->foreign('idInflation')->references('id')->on('inflations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_inflations');
    }
};
