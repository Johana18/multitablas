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
        Schema::create('cotizacion_producto', function (Blueprint $table) {
            $table->unsignedBigInteger('cod_cotizacion')->nullable();
            $table->unsignedBigInteger('cod_producto')->nullable();

            $table->foreign('cod_cotizacion')
                ->references('cod_cotizacion')
                ->on('cotizacion')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->nullable();

            $table->foreign('cod_producto')
                ->references('cod_producto')
                ->on('producto')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->nullable();
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
        Schema::dropIfExists('cotizacion_producto');
    }
};
