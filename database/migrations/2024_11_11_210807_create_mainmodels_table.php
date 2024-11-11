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
        Schema::create('mainmodels', function (Blueprint $table) {
            $table->id();
            $table->integer('idUser');
            $table->integer('idWaktu'); // untuk 1 = makan pagi , 2 = makan siang , 3 = makan malam
            $table->string('nama');
            $table->string('lokasi');
            $table->string('harga');
            $table->string('keterangan');
            $table->string('gambar');
            $table->integer('status_rekomendasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mainmodels');
    }
};
