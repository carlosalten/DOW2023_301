<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jugadores', function (Blueprint $table) {
            //CAMPOS
            $table->string('rut')->primary();
            $table->string('nombre',20);
            $table->string('apellido',20);
            $table->tinyInteger('numero_camiseta');
            $table->string('posicion',10);

            //FK
            $table->integer('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('equipos');

            //created_at y updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};
