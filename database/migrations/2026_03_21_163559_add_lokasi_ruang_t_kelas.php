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
       //Buatlah perubahan tabel t_kelas dengan menambahkan field lokasi_ruangan dengan tipe data string dan panjang 100 karakter
        Schema::table('t_kelas', function (blueprint $table) {
            $table->string('lokasi_ruangan', 100)->after('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_kelas', function (blueprint $table) {
            $table->dropColumn('lokasi_ruangan');
        });
    }
};
