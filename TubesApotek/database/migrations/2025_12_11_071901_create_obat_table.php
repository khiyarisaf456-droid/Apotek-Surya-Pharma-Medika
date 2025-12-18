<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('obat', function (Blueprint $table) {
        $table->id();
        $table->string('kode');
        $table->string('nama_obat');
        $table->string('kategori');
        $table->integer('stok');
        $table->string('letak_rak');
        $table->date('tanggal_masuk');
        $table->date('tanggal_kadaluarsa');
        $table->integer('harga_modal');
        $table->integer('harga_jual');
        $table->string('satuan_jual');
        $table->integer('sisa_hari')->nullable();
        $table->string('status'); // aman / periksa / segera
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
