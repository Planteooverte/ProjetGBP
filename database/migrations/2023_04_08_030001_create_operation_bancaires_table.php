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
        Schema::create('operation_bancaires', function (Blueprint $table) {
            $table->id();
            $table->timestamp('DateOperation');
            $table->string('DescriptionOperation');
            $table->decimal('Credit')->nullable();
            $table->decimal('Debit')->nullable();
            $table->foreignId('idCompte')->nullable();
            $table->foreign('idCompte')->references('id')->on('compte_bancaires');
            $table->foreignId('idDomaine')->nullable();
            $table->foreign('idDomaine')->references('id')->on('domaines');
            $table->foreignId('idFichier')->nullable();
            $table->foreign('idFichier')->references('id')->on('Fichier_csvs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operation_bancaires');
    }
};
