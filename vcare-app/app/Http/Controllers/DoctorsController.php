<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Settings;
use App\Models\BookedDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $settings = Settings::all()->Last();
        $doctors = Doctors::all();

        return view('frontend.doctors',['settings'=>$settings,'doctors'=>$doctors]);
    }

    public function storeAppointment($id){
        $settings = Settings::all()->Last();
        $doctors = Doctors::where('id',$id)->first();
        // return dd($doctors);

        return view('frontend.storeAppoint',['settings'=>$settings,'doctors'=>$doctors]);
    }

    public function storeAppointmentPOST(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email:rfc,dns',
            'phone' => 'phone:EG',
            // 'brandLogo' => 'image|mimes:png',

        ], [
            'name.required' => 'Name Required',
            'name.min' => 'Name must be at least 3 Char.',
            'name.max' => 'Name Max. as 255 Char.',
            'email.required' => 'Email Required',
            'email.email' => 'Email must be Valid Email',
            'phone.phone' => 'Phone must be Valid Phone Number',
        ]);
            // return dd($validate->errors());
        if ($validate->fails()) {
            // return response()->json(['errors'=>$validate->errors()]);
            return back()->withErrors($validate->errors())->withInput();
        } else {
            $bookedDoctor =new BookedDoctor;
            $bookedDoctor->name = $request->name;
            $bookedDoctor->phone = $request->phone;
            $bookedDoctor->email = $request->email;
            $bookedDoctor->doctor_id = $request->doctor_id;
            $bookedDoctor->is_compeleted = '0';
            $bookedDoctor->is_readed = '0';
            $bookedDoctor->save();
            // return dd($bookedDoctor);
            return redirect()->back()->withErrors(['success'=>'Message Sent Successfully']);

        }
        return dd($request);
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
