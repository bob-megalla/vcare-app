<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use App\Models\Doctors;
use App\Models\Settings;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $settings = Settings::all()->Last();
        $majors = Majors::orderBy('id','ASC')->get();
        // dd($majors);

        return view('frontend.major',['settings'=>$settings,'majors'=>$majors]);
    }

    public function getDoctors($id){
        $settings = Settings::all()->Last();
        $doctors = Doctors::where('major_id',$id)->orderBy('name_doctor','ASC')->get();
        return view('frontend.getDoctors',['settings'=>$settings,'doctors'=>$doctors]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
