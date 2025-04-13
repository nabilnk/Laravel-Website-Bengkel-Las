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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('id_order')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('jenis_produk');
            $table->string('model_produk');
            $table->text('spesifikasi_produk');
            $table->string('dimensi_produk');
            $table->string('bahan_produk');
            $table->string('gambarsampel_produk');
            $table->string('harga_akhir')->nullable();
            $table->enum('status', ['pending','Diterima oleh Admin','Sedang diproses','Siap diantar','Diterima oleh Customer'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
