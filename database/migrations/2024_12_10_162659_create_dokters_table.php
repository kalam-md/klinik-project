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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama_dokter');
            $table->string('slug')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('nomor_telepon')->unique()->nullable();
            $table->string('alamat')->nullable();
            $table->unsignedBigInteger('spesialis_id');
            $table->foreign('spesialis_id')->references('id')->on('spesialis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
