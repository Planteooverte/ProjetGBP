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
        Schema::create('selectionners', function (Blueprint $table) {
            $table->id();
            $table->decimal('Qtconso')->nullable();
            $table->timestamps();
            $table->string('unite')->nullable();
            $table->foreignId('idUser');
            $table->foreignId('idDomaine');
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idDomaine')->references('id')->on('domaines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selectionners');
    }
};
