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
        //Buatlah perubahan tabel t_kelas dengan menambahkan field nama_walkel dengan tipe data string dan panjang 50 karakter
        Schema::table('t_kelas', function (blueprint $table) {
                $table->string('nama_walkel', 50)->after('jurusan');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_kelas', function (blueprint $table) {
            $table->dropColumn('nama_walkel');
        });
    }
};
