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
        Schema::create('cotizacion', function (Blueprint $table) {
            $table->BigIncrements('cod_cotizacion');
            $table->string('atencion');
            $table->float('precprod_ci', 8, 2)->nullable();
            $table->float('precprod_tot', 8, 2)->nullable();
            $table->float('cant_imp')->nullable();
            $table->float('utilidad_imp', 8, 2)->nullable();
            $table->float('precimp_ci', 8, 2)->nullable();
            $table->float('precimp_tot', 8, 2)->nullable();
            $table->date('vigencia_cot')->nullable();
            $table->unsignedBigInteger('cod_implemento')->nullable();
            $table->unsignedBigInteger('cod_cliente')->nullable();

            $table->foreign('cod_implemento')
                ->references('cod_implemento')
                ->on('implemento')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->nullable();

            $table->foreign('cod_cliente')
                ->references('cod_cliente')
                ->on('cliente')
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
        Schema::dropIfExists('cotizacion');
    }
};
