<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipocredito_id');
            $table->unsignedBigInteger('cliente_id');
            $table->bigInteger('credito');
            $table->enum('vigente',['SI','NO'])->default('SI');

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('tipocredito_id')->references('id')->on('tipocreditos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creditos');
    }
}
