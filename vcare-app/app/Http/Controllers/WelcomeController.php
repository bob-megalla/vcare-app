<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
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
        $user_doctor = User::where('roles','doctors')
        ->where('is_active',"1")
        ->where('is_confirmed',"1")
        ->orderBy('id','desc')
        ->get();

        $news = News::where('published','1')->orderBy('id','desc')->paginate(4);

        // dd($user_doctor);

        return view('frontend.welcome',['settings'=>$settings,'majors'=>$majors,'doctors'=>$doctors,'news'=>$news,'user_doctor'=>$user_doctor]);
    }

}
