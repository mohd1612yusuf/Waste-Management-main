<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'address' => 'Admin Address',
            'sector' => 'A1',
            'role' => json_encode(['user', 'admin']),
        ]);

        // Staff user
        User::create([
            'name' => 'Staff One',
            'email' => 'staff1@example.com',
            'password' => Hash::make('password'),
            'address' => 'Staff Address',
            'sector' => 'S6',
            'role' => json_encode(['user', 'staff']),
        ]);

        User::create([
            'name' => 'Staff Two',
            'email' => 'staff2@example.com',
            'password' => Hash::make('password'),
            'address' => 'Staff2 Address',
            'sector' => 'S1',
            'role' => json_encode(['user', 'staff']),
        ]);

        // User with multiple roles
        User::create([
            'name' => 'Multi Role User',
            'email' => 'multi@example.com',
            'password' => Hash::make('password'),
            'address' => 'Multi Address',
            'sector' => 'S3',
            'role' => json_encode(['user', 'admin', 'staff']),
        ]);

        User::factory()->count(5)->create();
    }
}
