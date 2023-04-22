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
            $table->foreignId('compte_bancaire_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('domaine_id')->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('fichier_csv_id')->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // $table->foreign('compte_id')->references('id')->on('compte_bancaires');
            // $table->foreignId('domaine_id')->nullable();
            // $table->foreign('domaine_id')->references('id')->on('domaines');
            // $table->foreignId('fichier_id')->nullable();
            // $table->foreign('fichier_id')->references('id')->on('fichier_csvs');
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
