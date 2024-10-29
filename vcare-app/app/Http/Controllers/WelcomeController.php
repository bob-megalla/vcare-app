<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Majors;
use App\Models\Doctors;
use App\Models\Settings;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index(){

        $settings = Settings::all()->Last();
        $majors = Majors::paginate(6);
        $doctors = Doctors::all();
        $news = News::all();

        // dd($majors);

        return view('frontend.welcome',['settings'=>$settings,'majors'=>$majors,'doctors'=>$doctors,'news'=>$news]);
    }

}
