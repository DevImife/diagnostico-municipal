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
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('postcode_id')->constrained('postcodes')->onDelete('cascade'); // FK con coordinaciones
            $table->string('nombre_plantel',250);
            $table->string('latitud',30);
            $table->string('longitud',30);
            $table->string('telefono',12)->nullable();
            $table->string('inah',10)->nullable();
            $table->integer('edad_plantel')->nullable();
            $table->string('archivo_plantel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
