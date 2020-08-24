<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_identificacion',  ['CC', 'RC', 'TI', 'AS', 'MS', 'PA'])->required();
            $table->string('identificacion', 30)->required()->unique();
            $table->string('primer_nombre', 30)->required();
            $table->string('segundo_nombre',30)->nullable(1);
            $table->string('primer_apellido', 30)->required();
            $table->string('segundo_apellido', 30)->nullable(1);
            $table->string('direccion', 125)->required();
            $table->integer('telefono')->nullable(1);
            $table->string('email', 50)->required();
            $table->string('ocupacion', 100)->nullable(1);
            $table->unsignedBigInteger('departamentos_id');
            $table->unsignedBigInteger('municipios_id');
            $table->timestamps();

            $table->foreign('departamentos_id')->references('id')->on('departamentos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('municipios_id')->references('id')->on('municipios')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
