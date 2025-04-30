<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Garbage;
class GarbageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Garbage::create([
            'type' => 'Plastic',
            'description' => 'Plastic bottles and containers',
            'user_email' => 'staff1@example.com',
            'status' => 'pending'
        ]);

        Garbage::create([
            'type' => 'Organic',
            'description' => 'Food waste and leaves',
            'user_email' => 'staff2@example.com',
            'status' => 'picked'
        ]);

        // Add more if needed
    }
}
