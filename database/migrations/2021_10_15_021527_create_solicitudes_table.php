<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->integer('folio');
            $table->string('num_expediente');
            $table->dateTime('fecha_recibido');
            $table->string('nombre_remitente');
            $table->string('telefono_remitente');
            $table->string('referencia');
            $table->string('tipo_solicitud');
            $table->string('asunto');
            $table->string('observaciones');
            $table->integer('status');
            $table->integer('prioridad');
            $table->string('descripcion_solucion');
            $table->dateTime('fecha_atencion');
            $table->dateTime('fecha_fin');
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
        Schema::dropIfExists('solicitudes');
    }
}
