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
        Schema::create('associers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('idUser');
            $table->foreignId('idCentImpot');
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idCentImpot')->references('id')->on('centre_impositions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associers');
    }
};
