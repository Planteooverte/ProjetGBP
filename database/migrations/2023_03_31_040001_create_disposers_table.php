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
        Schema::create('disposers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('idUser');
            $table->foreignId('idCompte');
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idCompte')->references('id')->on('compte_bancaires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disposers');
    }
};
