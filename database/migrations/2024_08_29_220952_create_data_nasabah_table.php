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
        Schema::create('data_nasabah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->timestamp('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->integer('provinsi');
            $table->integer('kota');
            $table->integer('kecamatan');
            $table->integer('kelurahan');
            $table->string('nama_jalan');
            $table->string('rt');
            $table->string('rw');
            $table->bigInteger('nominal_setor');
            $table->integer('created_by');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_nasabah');
    }
};
