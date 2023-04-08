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
        Schema::create('debiters', function (Blueprint $table) {
            $table->id();
            $table->string('TypeD');
            $table->foreignId('idOperation')->nullable();
            $table->foreignId('idDomaine')->nullable();
            $table->foreignId('idImpot')->nullable();
            $table->foreign('idOperation')->references('id')->on('operation_bancaires');
            $table->foreign('idDomaine')->references('id')->on('domaines');
            $table->foreign('idImpot')->references('id')->on('rel_impositions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debiters');
    }
};
