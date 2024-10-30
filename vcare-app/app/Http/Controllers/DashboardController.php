<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Majors;
use App\Models\Doctors;
use App\Models\Messages;
use App\Models\Settings;
use App\Models\BookedDoctor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $settings = Settings::all()->first();
        $doctors = Doctors::all();
        $messages = Messages::all();
        $majors = Majors::all();
        $users = User::all();
        $news = News::all();
        $BookedDoctors = BookedDoctor::all();
        return view('backend.admin.dashboard', compact('settings','doctors','messages','majors','users','news','BookedDoctors'));

    }

    public function indexUser(){
        $settings = Settings::all()->first();
        // $doctors = Doctors::all();
        // $messages = Messages::all();
        // $majors = Majors::all();
        // $users = User::all();
        // $news = News::all();
        // $BookedDoctors = BookedDoctor::all();
        $BookedComp = BookedDoctor::where('user_id',auth()->user()->id)
        ->where('is_compeleted',"1")
        ->get();
        // return dd($BookedComp);
        $BookedNotComp = BookedDoctor::where('user_id',auth()->user()->id)
        ->where('is_compeleted',"0")
        ->get();
        return view('frontend.user.dashboard', compact('settings','BookedComp','BookedNotComp'));

    }


    public function indexDoctor(){
        $settings = Settings::all()->first();
        $doctors = Doctors::all();
        $messages = Messages::all();
        $majors = Majors::all();
        $users = User::all();
        $news = News::all();
        $BookedDoctors = BookedDoctor::where('user_id',auth()->user()->id)->get();
        $BookedComp = BookedDoctor::where('doctor_id',auth()->user()->id)
        ->where('is_compeleted',"1")
        ->get();
        // return dd($BookedComp);
        $BookedNotComp = BookedDoctor::where('doctor_id',auth()->user()->id)
        ->where('is_compeleted',"0")
        ->get();
        return view('backend.doctors.dashboard', compact('settings','doctors','messages','majors','users','news','BookedDoctors','BookedComp','BookedNotComp'));

    }

    public function indexBooked(){
        $settings = Settings::all()->first();
        $BookedDoctors = BookedDoctor::where('user_id',auth()->user()->id)->get();
        // return dd($BookedDoctors);
        return view('frontend.user.booked',compact('settings','BookedDoctors'));
    }

    public function indexBookedDoctor(){
        $settings = Settings::all()->first();
        $BookedDoctors = BookedDoctor::where('doctor_id',auth()->user()->id)->get();

        return view('backend.doctors.bookedDoctor',compact('settings','BookedDoctors'));
        return dd('test');
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }
}
