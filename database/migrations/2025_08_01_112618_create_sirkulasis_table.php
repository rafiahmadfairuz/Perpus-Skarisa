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
        Schema::create('sirkulasis', function (Blueprint $table) {
            $table->string('id_sirkulasi')->primary();
            $table->string('id_buku');
            $table->foreign('id_buku')->references('id_buku')->on('bukus')->onDelete('cascade');
            $table->string('id_anggota');
            $table->foreign('id_anggota')->references('id_anggota')->on('anggotas')->onDelete('cascade');
            $table->date("tgl_pinjam");
            $table->date("tgl_kembali");
            $table->date("tgl_dikembalikan")->nullable();
            $table->enum("status", ["PIN", "KEM"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sirkulasis');
    }
};
