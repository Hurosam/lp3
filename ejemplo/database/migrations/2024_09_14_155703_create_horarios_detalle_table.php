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
        Schema::create('horarios_detalle', function (Blueprint $table) {
            $table->id();
            $table->string("dia", 12);
            $table->string("hora_entrada", 8);
            $table->string("hora_salida", 8);
        });

        Schema::table('horarios_detalle', function (Blueprint $table) {
            $table->foreignId("id_horario")->constrained("horarios");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_detalle');
    }
};
