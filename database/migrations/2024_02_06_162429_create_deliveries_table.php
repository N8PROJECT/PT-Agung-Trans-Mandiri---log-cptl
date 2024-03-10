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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('area');
            $table->date('tanggal_kirim')->format('d/m/Y');
            $table->string('pengirim');
            $table->string('cabang_pengirim');
            $table->unsignedBigInteger('nomor_segel')->nullable()->length(7);
            $table->string('tujuan_dokumen');
            $table->unsignedBigInteger('capital_branch_id');
            $table->foreign('capital_branch_id')->references('id')->on('capital_branches')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kota');
            $table->string('jenis_kiriman');
            $table->string('nama_penerima');
            $table->date('tanggal_terima')->format('d/m/Y');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
