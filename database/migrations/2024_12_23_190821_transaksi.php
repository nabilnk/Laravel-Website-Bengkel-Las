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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_order')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('status_pembayaran', ['Belum Ada Pembayaran','Belum Lunas','Lunas'])->default('Belum Ada Pembayaran');   
            $table->foreign('id_order')->references('id')->on('orders');
            $table->string('informasi_pembayaran')->nullable();
            $table->string('harga_akhir')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('langkah_pembayaran')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('validasi',['Valid','Tidak Valid','Belum di cek'])->default('Belum di cek');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
