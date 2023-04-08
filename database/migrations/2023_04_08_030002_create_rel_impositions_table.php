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
        Schema::create('rel_impositions', function (Blueprint $table) {
            $table->id();
            $table->string('TypeImposition');
            $table->year('AnneeFiscal');                    /*Année Fiscal */
            $table->decimal('Montant');
            $table->datetime('DateEtablissement');          /*Date Etablissement */   
            $table->float('TauxImposition');
            $table->decimal('RevenuFiscalDeReference');
            $table->integer('NbrDePart');
            $table->foreignId('idDomaine')->nullable();
            $table->foreign('idDomaine')->references('id')->on('domaines');
            $table->foreignId('idCentImpot')->nullable();
            $table->foreign('idCentImpot')->references('id')->on('profil_imposition');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_impositions');
    }
};
