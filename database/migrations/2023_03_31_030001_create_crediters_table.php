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
        Schema::create('crediters', function (Blueprint $table) {
            $table->id();
            $table->string('TypeC');
            $table->foreignId('idOperation')->nullable();
            $table->foreignId('idDomaine')->nullable();
            $table->foreignId('idFichePaye')->nullable();
            $table->foreign('idOperation')->references('id')->on('operation_bancaires');
            $table->foreign('idDomaine')->references('id')->on('domaines');
            $table->foreign('idFichePaye')->references('id')->on('fiche_de_payes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crediters');
    }
};
