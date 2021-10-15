<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecretariasTurnadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secretarias_turnadas', function (Blueprint $table) {
            $table->id();
            $table->boolean('aceptada');
            $table->integer('secretaria_id');
            $table->integer('num_instruccion');
            $table->integer('solicitud_id');
            $table->integer('dependencia_id')->nullable();
            $table->integer('dependencia_status')->nullable();
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
        Schema::dropIfExists('secretarias_turnadas');
    }
}
