<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('eventos_id')->unsigned();
            $table->bigInteger('atletas_id')->unsigned();
            $table->bigInteger('modalidades_id')->unsigned();
            $table->text('categorias')->nullable();
            $table->timestamps();
            $table->foreign('eventos_id')->references('id')->on('eventos')->cascadeOnDelete();
            $table->foreign('modalidades_id')->references('id')->on('modalidades')->cascadeOnDelete();
            $table->foreign('atletas_id')->references('id')->on('atletas')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participantes');
    }
}
