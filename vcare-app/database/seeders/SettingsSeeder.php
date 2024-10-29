<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Settings::create([
            // 'name' => 'Hardik',
            // 'email' => 'admin@gmail.com',
            // 'password' => bcrypt('123456'),
            'site_name' => 'VCareApp',
            'question_img' => '20241018155125.jpg',
            'question_home'=>'Have a Medical Question',
            'question_answer'=>'Lorem ipsum, dolor sit',
            'footer_title'=>'About Us',
            'footer_contact'=>'Lorem ipsum, dolor sit amet',
            'footer_app_title'=>'download the application now',
            'footer_app_contact'=>'Lorem ipsum dolor sit amet consectetur',
            'footer_app_img'=>'20241018155158.jpg',
        ]);
    }
}
