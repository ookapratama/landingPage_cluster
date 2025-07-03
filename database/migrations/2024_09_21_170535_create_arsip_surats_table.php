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
        Schema::create('arsip_surats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kd_klasifikasi_id');
            $table->string('nomor');
            $table->date('tgl');
            $table->string('perihal');
            $table->string('pencipta');
            $table->string('unit_pengolah');
            $table->text('uraian');
            $table->string('jenis_media');
            $table->string('lokal');
            $table->string('ket_keaslian');
            $table->string('jumlah');
            $table->string('no_rak');
            $table->string('no_box');
            $table->string('retensi');
            $table->string('retensi2');
            $table->string('retensi3');
            $table->string('ttd')->nullable();
				$table->string('tujuan')->nullable();
				$table->string('file');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip_surats');
    }
};
