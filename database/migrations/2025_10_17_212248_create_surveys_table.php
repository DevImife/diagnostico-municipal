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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); // FK con coordinaciones
            $table->foreignId('plantel_id')->constrained('institutions')->onDelete('cascade'); // FK con coordinaciones
            $table->json('matricula');
            $table->json('amenazas');
            $table->json('otrosElementos');
            $table->json('medidas');
            $table->json('zonaSismica');
            $table->json('documentoPropiedad');
            $table->json('servicioPlantel');
            $table->json('servSanitarioCantidad');
            $table->json('servSanitarioEstado');
            $table->json('tipoDescarga');
            $table->json('edifEspaciosCantidad');
            $table->json('edifTipoEstructura');
            $table->json('edifCondiciones');
            $table->json('obraExteriorEstado');
            $table->json('obraExteriorComplementos');
            $table->json('necesidadMejora');
            $table->json('elemEstructuraMejora');
            $table->json('elemExteriorMejora');
            $table->json('accesibilidadMejora');
            $table->json('espaciosMejora');
            $table->json('descripcionMejora');
            $table->json('bienes');
            $table->json('energiaElectrica');
            $table->json('fotografias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
