<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hama extends Model
{
    use HasFactory;
    protected $table = 'infohama';
    protected $primaryKey = 'Id_Hama';
    protected $fillable = [
        'nama',
        'klasifikasi',
        'gambar',
        'deskripsi',
    ];
}
