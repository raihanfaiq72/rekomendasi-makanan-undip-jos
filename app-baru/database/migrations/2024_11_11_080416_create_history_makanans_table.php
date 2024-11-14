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
        Schema::create('history_makanans', function (Blueprint $table) {
            $table->id();
            $table->integer('idUser');
            $table->integer('waktu_makan');
            $table->string('refrensi');
            $table->timestamp('dipilih_saat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_makanans');
    }
};
