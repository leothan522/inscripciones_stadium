<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('comprobante');
            $table->string('banco');
            $table->string('tipo');
            $table->date('fecha');
            $table->decimal('monto', 12, 2);
            $table->bigInteger('eventos_id')->unsigned();
            $table->bigInteger('atletas_id')->unsigned();
            $table->integer('estatus')->default(0);
            $table->timestamps();
            $table->foreign('eventos_id')->references('id')->on('eventos')->cascadeOnDelete();
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
        Schema::dropIfExists('pagos');
    }
}
