<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataPengguna extends Model
{
    use HasFactory;
    protected $table = 'datapengguna';

    // Menentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    // Relasi dengan model User
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class );
    }
}
