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
        return view('backend.dashboard', compact('settings','doctors','messages','majors','users','news','BookedDoctors'));

    }

    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }
}
