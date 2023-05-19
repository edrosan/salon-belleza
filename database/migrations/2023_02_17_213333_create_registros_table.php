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
        Schema::create('REGISTROS', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->require;
            $table->string('apellido')->require;
            $table->string('alias')->unique;
            $table->string('calle')->require;
            $table->string('numero')->require;
            $table->string('colonia')->require;
            $table->string('cp')->require;
            $table->string('celular')->require;
            $table->string('local')->require;
            $table->string('correo')->require;
            $table->string('password')->require;
            $table->timestamps();
        });
    }
// 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros');
    }
};
