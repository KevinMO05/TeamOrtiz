<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'dni' => '12345678', // Puedes poner un DNI de ejemplo
            'name' => 'Kevin',
            'last_name' => 'Apellido', // Puedes poner un apellido de ejemplo
            'email' => 'kevin@gmail.com',
            'phone' => '123456789', // Puedes poner un número de teléfono de ejemplo
            'password' => Hash::make('kevin12345'),
        ]);
    }
}