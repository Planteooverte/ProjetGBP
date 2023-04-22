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
            $table->foreignId('domaine_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('profil_imposition_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            // $table->foreignId('domaine_id')->nullable();
            // $table->foreign('domaine_id')->references('id')->on('domaines');
            // $table->foreignId('centimpot_id')->nullable();
            // $table->foreign('centimpot_id')->references('id')->on('profil_impositions');
            
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
