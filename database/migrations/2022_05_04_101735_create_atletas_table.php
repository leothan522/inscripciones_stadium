<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletas', function (Blueprint $table) {
            $table->id();
            $table->string('cedula')->unique();
            $table->bigInteger('users_id')->unsigned()->nullable();
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('sexo');
            $table->date('fecha_nac');
            $table->string('pais');
            $table->string('telefono_celular');
            $table->bigInteger('clubes_id')->unsigned()->nullable();
            $table->string('talla_franela');
            $table->string('path_foto');
            $table->string('file_foto');
            $table->string('direccion')->nullable();
            $table->string('telefono_residencia')->nullable();
            $table->string('grupo_sanguineo')->nullable();
            $table->string('alergico')->nullable();
            $table->string('alergias')->nullable();
            $table->string('contacto_emergencia')->nullable();
            $table->string('telefono_emergencia')->nullable();
            $table->string('antecedentes_medicos')->nullable();
            $table->text('observaciones')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('clubes_id')->references('id')->on('clubes')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atletas');
    }
}
