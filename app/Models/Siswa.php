<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public $table = 't_siswa';
    
    protected $fillable = [
        'nis',
        'nama_lengkap',
        'jk',
        'golongan_darah',
    ];
}