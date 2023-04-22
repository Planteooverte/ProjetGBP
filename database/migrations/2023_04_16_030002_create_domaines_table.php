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
        Schema::create('domaines', function (Blueprint $table) {
            $table->id();
            $table->string('NomDomaine');
            $table->decimal('QuantiteConsommee')->nullable();
            $table->string('Unite')->nullable();
            $table->year('Annee');
            $table->foreignId('user_id')->nullable()
                        ->constrained()
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            // $table->foreignId('user_id');
            // $table->foreign('user_id')->references('id')->on('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domaines');
    }
};
