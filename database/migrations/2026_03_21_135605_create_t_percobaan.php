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
        Schema::create('t_percobaan', function (Blueprint $table) {
            $table->id();
            $table->integer('kolom_integer');
            $table->bigInteger('kolom_biginteger');
            $table->float('kolom_float');
            $table->double('kolom_double');
            $table->decimal('kolom_decimal', 8, 2);
            $table->string('kolom_string', 100);
            $table->text('kolom_text');
            $table->longText('kolom_longtext');
            $table->boolean('kolom_boolean');
            $table->date('kolom_date');
            $table->time('kolom_time');
            $table->dateTime('kolom_datetime');
            $table->char('kolom_char', 10);
            $table->uuid('kolom_uuid');
            $table->json('kolom_json');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_percobaan');
    }
};
