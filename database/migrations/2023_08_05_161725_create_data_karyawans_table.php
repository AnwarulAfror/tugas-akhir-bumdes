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
        Schema::create('data_karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('no_karyawan');
            $table->string('nama');
            $table->string('alamat');
            $table->enum('jabatan', ['ketua', 'bendahara', 'wakil_ketua'])->default('ketua');
            $table->string('no_kontak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_karyawans');
    }
};