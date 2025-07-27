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
        Schema::create('iurans', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->unsignedBigInteger('user_id'); // foreign key ke tabel users
            $table->string('nama_iuran'); // Nama iuran
            $table->integer('jumlah'); // Jumlah iuran
            $table->date('tanggal'); // Tanggal iuran
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status', ['belum dibayar', 'selesai'])->default('belum dibayar'); // Kolom untuk bukti pembayaran (nullable)
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisi foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iurans');
    }
};
