<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    use HasFactory;
    protected $table = 'infotanaman';
    protected $primaryKey = 'Id_Tanaman';
    protected $keyType = 'int';
    protected $fillable = [
        'nama',
        'klasifikasi',
        'gambar',
        'deskripsi',
    ];
}
