<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Iuran extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        'nama_iuran',
        'jumlah',
        'tanggal',
        'bukti_pembayaran',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date', // Pastikan Laravel memparsedate ini sebagai objek Carbon
    ];

    // Definisi relasi ke model User
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
