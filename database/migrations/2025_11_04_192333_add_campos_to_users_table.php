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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('id_rol')->nullable()->after('email');
            $table->unsignedBigInteger('id_municipio')->nullable()->after('id_rol');
            $table->boolean('status')->default(1)->after('id_municipio');

            // 🔹 Relaciones (si existen tablas roles y municipios)
            $table->foreign('id_rol')->references('id')->on('roles')->onDelete('set null');
            $table->foreign('id_municipio')->references('id')->on('municipalities')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign(['id_rol']);
            $table->dropForeign(['id_municipio']);
            $table->dropColumn(['id_rol', 'id_municipio', 'status']);
        });
    }
};
