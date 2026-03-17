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
        Schema::create('postcodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('municipio_id')->constrained('municipalities')->onDelete('cascade'); // FK con coordinaciones
            $table->string('codigo_postal',15);
            $table->string('localidad',255);
            $table->string('tipo',100);
            $table->string('zona',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postcodes');
    }
};
