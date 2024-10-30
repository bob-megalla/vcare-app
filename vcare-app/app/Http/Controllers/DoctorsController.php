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
            $bookedDoctor->user_id = auth()->user()->id;
            $bookedDoctor->is_compeleted = '0';
            $bookedDoctor->is_readed = '0';
            $bookedDoctor->save();
            // return dd($bookedDoctor);
            return redirect()->back()->withErrors(['success'=>'Message Sent Successfully']);

        }
        return dd($request);
    }

    public function changeStatusBooked($id){
        $booked = BookedDoctor::where('id',$id)->first();
        if($booked->is_compeleted == '0'){
            $booked->is_compeleted = '1';
        }else{
            $booked->is_compeleted = '0';
        }
        $booked->is_readed = '1' ;
        // return dd($booked);
        $booked->save();
        return redirect()->back()->with(['success'=>'Status Changed Successfully !! Have A Good Day']);
        return dd($id);
    }
    public function changeStatusBookedRead($id){
        $settings = Settings::all()->Last();
        $selectedBooked = BookedDoctor::where('id',$id)->first();
        $selectedBooked->is_readed = '1';
        $selectedBooked->save();

        // return dd($selectedBooked);
        return view('backend.doctors.readBooked',compact('settings','selectedBooked'));
        return dd($id);
    }

    public function deleteBooked($id){
        $booked = BookedDoctor::where('id',$id)->first()->delete();
        return redirect()->back()->with(['success'=>'Delete Successfully !! Have A Good Day']);
        return dd($id);
    }
}
