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
    {   //Buatlah tabel t_kelas dengan field nama_kelas, jurusan
        Schema::create('t_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas', 20); 
            $table->string('jurusan', 40); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_kelas');
    }
};
