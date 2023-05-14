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
            $table->date('Periode');
            $table->decimal('SalaireBrut');
            $table->decimal('SalaireNet');
            $table->decimal('ChargeEmployeur');
            $table->foreignId('domaine_id')
                        ->constrained()
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            $table->foreignId('entreprise_id')
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
        Schema::dropIfExists('fiche_de_payes');
    }
};
