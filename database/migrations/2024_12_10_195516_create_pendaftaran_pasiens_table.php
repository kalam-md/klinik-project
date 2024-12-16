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
        Schema::create('pendaftaran_pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('slug')->unique();
            $table->string('tanggal_pemeriksaan');
            $table->integer('nomor_antrian');
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('pasien_id');
            $table->foreign('pasien_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('keluhan_id');
            $table->foreign('keluhan_id')->references('id')->on('keluhans')->onDelete('cascade');
            $table->unsignedBigInteger('dokter_id');
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_pasiens');
    }
};
