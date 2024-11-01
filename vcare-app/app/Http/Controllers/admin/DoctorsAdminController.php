<?php

namespace App\Http\Controllers\admin;


use App\Models\Doctors;
use App\Models\Settings;
use App\Models\BookedDoctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DoctorsAdminController extends Controller
{
    //
    public function AllDoctors(){
        $settings = Settings::all()->Last();
        $doctors = Doctors::all();

        return view('backend.admin.doctor',compact('settings','doctors'));
    }

    public function getBooked($id){
        $settings = Settings::all()->Last();
        $selectedBooked = BookedDoctor::where('id',$id)->first();
        return view('backend.admin.booked.getBooked',compact('settings','selectedBooked'));
    }

    public function NewDoctor(){
        $settings = Settings::all()->Last();
        return view('backend.admin.doctors.NewDoctor',compact('settings'));
    }

    public function StoreNewDoctor(Request $request){
        $validate = Validator::make($request->all(), [
            'doctorName' => 'required|min:3|max:255',
            'user_id' => 'required|unique:doctors,user_id',
            'major_id' => 'required',
            'DoctorImage' => 'required|mimes:png,jpg,jpeg'
        ], [
            'doctorName.required' => 'Doctor Name Required',
            'doctorName.min' => 'Doctor Name must have 3 char.',
            'doctorName.max' => 'Doctor Name must have 255 char. as max',
            'user_id.required' => 'Select Doctor User Required',
            'user_id.unique' => 'This Account Already Connected To Another',
            'major_id.required' => 'Select Major Required',
            'DoctorImage.required' => 'Doctor Image Required',
            'DoctorImage.mimes' => 'Image Major must be .png OR .jpg OR . jpeg',
        ]);
        if ($validate->fails()) {
            // return dd($validate->errors()->messages());
            // return response()->json(['errors'=>$validate->errors()]);
            return back()->with($validate->errors()->messages())->withInput();
        } else {
            $doctors = new Doctors;
            $doctors->name_doctor = $request->doctorName;
            if($request->file('DoctorImage') != null){
                $request->validate([
                    'DoctorImage' => 'required|mimes:png,jpg'
                ]);

                $the_file_path=uploadimage('assets/img/doctors',$request->DoctorImage);
                $doctors->img_doctor = $the_file_path;
            }
            $doctors->user_id = $request->user_id;
            $doctors->major_id = $request->major_id;


            $doctors->save();

            return redirect()->back()->with(['success'=>'Major Updated Successfully']);

        }
    }

    public function EditDoctor($id){
        $settings = Settings::all()->Last();
        $doctors = Doctors::where('id',$id)->first();
        return view('backend.admin.doctors.EditDoctor',compact('settings','doctors'));
    }

    public function StoreEditDoctor(Request $request){
        $validate = Validator::make($request->all(), [
            'doctorName' => 'required|min:3|max:255',
            // 'user_id' => 'required|unique:doctors,user_id',
            'major_id' => 'required',
            'DoctorImage' => 'mimes:png,jpg,jpeg'
        ], [
            'doctorName.required' => 'Doctor Name Required',
            'doctorName.min' => 'Doctor Name must have 3 char.',
            'doctorName.max' => 'Doctor Name must have 255 char. as max',
            // 'user_id.required' => 'Select Doctor User Required',
            // 'user_id.unique' => 'This Account Already Connected To Another',
            'major_id.required' => 'Select Major Required',
            // 'DoctorImage.required' => 'Doctor Image Required',
            'DoctorImage.mimes' => 'Image Major must be .png OR .jpg OR . jpeg',
        ]);
        if ($validate->fails()) {
            // return dd($validate->errors()->messages());
            // return response()->json(['errors'=>$validate->errors()]);
            return back()->with($validate->errors()->messages())->withInput();
        } else {
            $doctors = Doctors::where('id',$request->id)->first();
            // return dd($doctors);
            $doctors->name_doctor = $request->doctorName;
            $oldphotoPath = $doctors ->img_doctor;
            if($request->file('DoctorImage') != null){

                $the_file_path=uploadimage('assets/img/doctors',$request->DoctorImage);

                $doctors->img_doctor = $the_file_path;
                    // return dd('assets/admin/uploads'.'/'.$oldphotoPath);
                    // return dd(file_exists('assets/admin/uploads/'.$oldphotoPath));
                    if($oldphotoPath!=null || $oldphotoPath=""){

                        if(file_exists('assets/img/doctors/'.$oldphotoPath)){
                            unlink('assets/img/doctors/'.$oldphotoPath);
                        }
                    }
            }
            if($doctors->user_id = $request->user_id){
                $doctors->user_id = $request->user_id;
            }
            $doctors->major_id = $request->major_id;


            $doctors->save();

            return redirect()->back()->with(['success'=>'Doctor Updated Successfully']);

        }
    }

    public function DeleteDoctor($id){
        $booked = BookedDoctor::where('doctor_id',$id)->get();
        foreach($booked as $book){
            $book->delete();
        }
        $doctor = Doctors::where('id',$id)->first();

        $doctor ->delete();
        return redirect()->back()->with(['success'=>'Doctor Deleted Successfully']);

    }
}
