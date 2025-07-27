<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users'; // Jika tabel Anda tidak bernama 'users'

    protected $fillable = ['username', 'email', 'password', 'role'];

    // Menentukan relasi one-to-one dengan model Datapengguna
    public function datapengguna() : HasOne
    {
        return $this->hasOne(DataPengguna::class);
    }

    public function iurans(): HasMany
    {
        return $this->hasMany(Iuran::class); 
    }
}
