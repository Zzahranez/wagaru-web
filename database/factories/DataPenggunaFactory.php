<?php

namespace Database\Factories;

use App\Models\DataPengguna;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataPengguna>
 */
class DataPenggunaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = DataPengguna::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(), // Membuat relasi dengan factory User
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
        ];
    }
}
