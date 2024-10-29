<?php

namespace Database\Seeders;

use App\Models\Majors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate Fake data
        // Majors::factory()   // refers to postfactory.php class
        // ->count(10)
        // ->create();
        // Inserting data with values
        Majors::create([
            'name_major'=>"First Major",
            'img_major'=>"20241018063403.jpg"
        ]);
    }
}
