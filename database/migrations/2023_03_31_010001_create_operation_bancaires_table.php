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
