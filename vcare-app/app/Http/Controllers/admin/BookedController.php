<?php

namespace App\Http\Controllers\admin;

use App\Models\Settings;
use App\Models\BookedDoctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookedController extends Controller
{
    //
    public function AllBooked(){
        $settings = Settings::all()->first();
        $BookedDoctors = BookedDoctor::all();
        return view('backend.admin.booked', compact('BookedDoctors', 'settings'));
    }
}
