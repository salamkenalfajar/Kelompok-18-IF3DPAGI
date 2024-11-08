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
       Schema::create('infotanaman', function (Blueprint $table) {
        $table->increments('Id_Tanaman');
        $table->string('Nama', 100);
        $table->string('Gambar', 100)->nullable();
        $table->string('Klasifikasi', 100);
        $table->string('Deskripsi', 100);
        $table->timestamps();
       });

       Schema::create('infohama', function (Blueprint $table) {
        $table->increments('Id_Hama');
        $table->string('Nama', 100);
        $table->string('Gambar', 100)->nullable();
        $table->string('Klasifikasi', 100);
        $table->string('Deskripsi', 100);
        $table->timestamps();
       });
     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infotanaman');
        Schema::dropIfExists('infohama');
    }
};
