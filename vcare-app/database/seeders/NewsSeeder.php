<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        News::create([
            'img_link'=>"https://www.svgrepo.com/show/419891/healthcare-hospital-medical-42.svg",
            'title_news'=>"everything you need is found at VCare.",
            'contact_news'=>"search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone, you can also order medicine or book a surgery askahksuhda ahsckas idaisudahsdiuhas d .dasdasdas asdadad  asdadasd asdasdasd asdadasd asd asda",
            'published'=>1
        ]);
    }
}
