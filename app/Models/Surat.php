<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surats';

    // Tentukan kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'jenis_surat',
        'status',
        'tanggal_lahir',
        'jenis_kelamin',
        
    ];

    // Tentukan kolom yang harus diperlakukan sebagai tanggal
    protected $dates = [
        'tanggal_lahir',
        'created_at',
        'updated_at',
    ];
}
