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
        Schema::create('fiche_de_payes', function (Blueprint $table) {
            $table->id();
            $table->datetime('Periode');
            $table->decimal('SalaireBrut');
            $table->decimal('SalaireNet');
            $table->decimal('ChargeEmployeur');
            $table->foreignId('idDomaine')->nullable();
            $table->foreign('idDomaine')->references('id')->on('domaines');
            $table->foreignId('idEnt')->nullable();
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
        Schema::dropIfExists('fiche_de_payes');
    }
};
