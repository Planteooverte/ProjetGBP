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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('idUser');
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreignId('idEnt');
            $table->foreign('idEnt')->references('id')->on('entreprises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employers');
    }
};
