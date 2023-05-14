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
        Schema::create('rel_impositions', function (Blueprint $table) {
            $table->id();
            $table->string('TypeImposition');       //all
            $table->date('AnneeFiscal');            //all
            $table->decimal('Montant');             //all
            $table->date('DateEtablissement');      //all
            $table->float('TauxImposition')->nullable();
            $table->decimal('RevenuFiscalDeReference')->nullable();;
            $table->integer('NbrDePart')->nullable();;
            $table->foreignId('domaine_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('profil_imposition_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
