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
        //Buatlah perubahan tabel t_kelas, jurusan dengan mengganti panjangnya menjadi 50 karakter
        Schema::table('t_kelas', function (blueprint $table) {
            $table->string('jurusan', 50)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_kelas', function (blueprint $table) {
            $table->string('jurusan', 40)->change(); //posisi default awalnya 40, biar entar kalo error dan rollback, balik ke awal
        });
    }
};
