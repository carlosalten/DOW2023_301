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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('password');
            $table->string('nombre',50);
            $table->timestamp('ultimo_login')->nullable();
            $table->boolean('activo')->default(true);
            $table->smallInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('roles');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
