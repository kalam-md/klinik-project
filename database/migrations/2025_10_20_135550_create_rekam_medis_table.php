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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('pendaftaran_id');
            $table->foreign('pendaftaran_id')->references('id')->on('pendaftaran_pasiens')->onDelete('cascade');
            $table->text('hasil_pemeriksaan');
            $table->text('diagnosis');
            $table->text('tindakan_medis');
            $table->text('resep_obat')->nullable();
            $table->text('catatan_tambahan')->nullable();
            $table->string('tekanan_darah')->nullable();
            $table->string('suhu_tubuh')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->unsignedBigInteger('created_by'); // dokter/admin yang input
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
