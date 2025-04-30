<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;
class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Staff::create([
            'email' => 'staff1@example.com',
            'sector' => 'S1'
        ]);

        Staff::create([
            'email' => 'staff2@example.com',
            'sector' => 'S2'
        ]);

        // Add more if needed
    }

}
