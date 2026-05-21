<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public $table = 't_kelas';

    protected $fillable = [
        'nama_kelas',
        'jurusan',
        'nama_wali_kelas',
        'lokasi_ruangan'
    ];
}
