<?php

namespace Database\Seeders;

use App\Models\Doctors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Doctors::create([
            'name_doctor'=>"Samer",
            'img_doctor'=>"20241018063403.jpg",
            'major_id'=>1
        ]);
    }
}
