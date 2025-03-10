<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'recepcionista']);
        $role = Role::create(['name' => 'inhabilitar']);
        
        User::factory()->create([
            'email' => 'dalex@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('admin');
    }
}