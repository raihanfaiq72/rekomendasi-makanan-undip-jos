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
        Schema::create('prefensimakanans', function (Blueprint $table) {
            $table->id();
            $table->integer('idUser');
            $table->integer('waktu_makan');
            $table->string('refrensi');
            $table->date('rekomendasi_terakhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prefensimakanans');
    }
};
