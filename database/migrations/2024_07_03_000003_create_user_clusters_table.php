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
        Schema::create('user_clusters', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('akses');
            $table->string('no_telp');
            $table->string('url_pict');
            $table->integer('id_role');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_clusters');
    }
};
