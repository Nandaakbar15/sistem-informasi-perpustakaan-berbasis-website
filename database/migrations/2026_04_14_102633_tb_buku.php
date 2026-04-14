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
        Schema::create('TblBuku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string("nama_buku");
            $table->string("penerbit");
            $table->string("gambar");
            $table->enum('status', ['pinjam', 'kembali']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TblBuku');
    }
};
