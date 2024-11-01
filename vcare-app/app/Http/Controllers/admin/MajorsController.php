<?php

namespace App\Http\Controllers\admin;

use App\Models\Majors;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MajorsController extends Controller
{
    //
    public function AllMajors(){
        $settings = Settings::all()->first();
        $majors = Majors::all();
        return view('backend.admin.majors', compact('majors', 'settings'));
    }

    public function DeleteMajor($id){
        $majors = Majors::where('id',$id)->first()->delete();
        return redirect()->back()->with(['success'=>'Major deleted successfully']);
    }
    public function NewMajors(){
        $settings = Settings::all()->first();

        return view('backend.admin.majors.NewMajors',compact('settings'));
    }

    public function StoreNewMajors(Request $request){
        $validate = Validator::make($request->all(), [
            'name_major' => 'required|min:3|max:255',
            'img_major' => 'required|mimes:png,jpg,jpeg',
        ], [
            'name_major.required' => 'Name Major Required',
            'name_major.min' => 'Name Major must have 3 char.',
            'name_major.max' => 'Name Major must have 255 char. as max',
            'img_major.required' => 'Image Major Required',
            'img_major.mimes' => 'Image Major must be .png OR .jpg OR . jpeg',

            // 'brandLogo.required' => 'Please Upload Brand Logo Required',
            // 'brandLogo.image' => 'logo must be .png',


        ]);
        if ($validate->fails()) {
            // return dd($validate->errors()->messages());
            // return response()->json(['errors'=>$validate->errors()]);
            return back()->with($validate->errors()->messages())->withInput();
        } else {
            $majors = new Majors;
        $majors->name_major = $request->name_major;
        // $majors->question_home = $request->question_home;
        $oldphotoPath = $majors ->img_major;

        //   return dd($oldphotoPath);

        if($request->file('img_major') != null){
            $request->validate([
                'img_major' => 'required|mimes:png,jpg'
            ]);
            $the_file_path=uploadimage('assets/img/majors',$request->img_major);

            $majors->img_major = $the_file_path;
                // return dd('assets/admin/uploads'.'/'.$oldphotoPath);
                // return dd(file_exists('assets/admin/uploads/'.$oldphotoPath));
                if($oldphotoPath!=null || $oldphotoPath=""){

                    if(file_exists('assets/img/'.$oldphotoPath)){
                        unlink('assets/img/'.$oldphotoPath);
                    }
                }
        }

            $majors->save();

            return redirect()->back()->with(['success'=>'Major Add Successfully']);

        }
    }
    public function EditMajors($id){
        $settings = Settings::all()->first();
        $majors = Majors::where('id',$id)->first();
        return view('backend.admin.majors.EditMajors',compact('settings','majors'));
    }

    public function StoreEditMajors(Request $request){
        $validate = Validator::make($request->all(), [
            'name_major' => 'required|min:3|max:255',
            'img_major' => 'mimes:png,jpg,jpeg',
        ], [
            'name_major.required' => 'Name Major Required',
            'name_major.min' => 'Name Major must have 3 char.',
            'name_major.max' => 'Name Major must have 255 char. as max',
            'img_major.mimes' => 'Image Major must be .png OR .jpg OR . jpeg',

            // 'brandLogo.required' => 'Please Upload Brand Logo Required',
            // 'brandLogo.image' => 'logo must be .png',


        ]);
        if ($validate->fails()) {
            // return dd($validate->errors()->messages());
            // return response()->json(['errors'=>$validate->errors()]);
            return back()->with($validate->errors()->messages())->withInput();
        } else {
            $majors = Majors::where('id',$request->id)->first();
        $majors->name_major = $request->name_major;
        // $majors->question_home = $request->question_home;
        $oldphotoPath = $majors ->img_major;

        //   return dd($oldphotoPath);

        if($request->file('img_major') != null){
            $request->validate([
                'img_major' => 'required|mimes:png,jpg'
            ]);
            $the_file_path=uploadimage('assets/img/majors',$request->img_major);

            $majors->img_major = $the_file_path;
                // return dd('assets/admin/uploads'.'/'.$oldphotoPath);
                // return dd(file_exists('assets/admin/uploads/'.$oldphotoPath));
                if($oldphotoPath!=null || $oldphotoPath=""){

                    if(file_exists('assets/img/'.$oldphotoPath)){
                        unlink('assets/img/'.$oldphotoPath);
                    }
                }
        }

            $majors->save();

            return redirect()->back()->with(['success'=>'Major Updated Successfully']);

        }
    }
}
