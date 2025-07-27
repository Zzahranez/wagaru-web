<?php

namespace Database\Seeders;

use App\Models\DataPengguna;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
         // Membuat user admin
         $admin = User::factory()->create([
            'username' => 'admin',
            'email' => 'adminkliku@gmail.com',
            'password' => bcrypt('admin123321'),
            'role' => 'admin',
        ]);

        // Menambahkan datapengguna untuk admin
        DataPengguna::create([
            'user_id' => $admin->id,
            'nama' => 'Admin',
            'alamat' => 'Alamat Admin',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'Laki-laki',
        ]);

        // Membuat user test
        $testUser = User::factory()->create([
            'username' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('test123321'),
            'role' => 'user',
        ]);

        // Menambahkan datapengguna untuk user test
        DataPengguna::create([
            'user_id' => $testUser->id,
            'nama' => 'Test User',
            'alamat' => 'Alamat Test User',
            'tanggal_lahir' => '1995-05-05',
            'jenis_kelamin' => 'Perempuan',
        ]);
        // Membuat user test
        $testUser = User::factory()->create([
            'username' => 'test1',
            'email' => 'test1@gmail.com',
            'password' => bcrypt('test123321'),
            'role' => 'user',
        ]);

        // Menambahkan datapengguna untuk user test
        DataPengguna::create([
            'user_id' => $testUser->id,
            'nama' => 'Test User1',
            'alamat' => 'Alamat Test User1',
            'tanggal_lahir' => '1995-05-06',
            'jenis_kelamin' => 'Laki-laki',
        ]);
    }
}

