<?php

namespace App\Http\Controllers\admin;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    //
    public function Settings(){
        $settings = Settings::all()->first();
        // return dd($settings);
        return view('backend.admin.settings', compact('settings'));
    }
    public function StoreSettings(Request $request){
        $validate = Validator::make($request->all(), [
            'site_name' => 'required|min:3|max:255',
            'question_home' => 'required|min:3|max:255',
            'question_answer' => 'required|min:3|max:255',
            'footer_title' => 'required|min:3|max:255',
            'footer_contact' => 'required|min:3|max:255',
            'footer_app_title' => 'required|min:3|max:255',
            'footer_app_contact' => 'required|min:3|max:255',
            'question_img' => 'mimes:png,jpg,jpeg',
            'footer_app_img' => 'mimes:png,jpg,jpeg',


            // 'brandLogo' => 'image|mimes:png',

        ], [
            'site_name.required' => 'Site Name Required',
            'site_name.min' => 'Site Name must have 3 char.',
            'site_name.max' => 'Site Name must have 255 char. as max',
            'question_home.required' => 'Question Home Required',
            'question_home.min' => 'Question Home must have 3 char.',
            'question_home.max' => 'Question Home must have 255 char. as max',
            'question_answer.required' => 'Question Answer Required',
            'question_answer.min' => 'Question Answer must have 3 char.',
            'question_answer.max' => 'Question Answer must have 255 char. as max',
            'footer_title.required' => 'Footer Title Required',
            'footer_title.min' => 'Footer Title must have 3 char.',
            'footer_title.max' => 'Footer Title must have 255 char. as max',
            'footer_contact.required' => 'Footer Contact Required',
            'footer_contact.min' => 'Footer Contact must have 3 char.',
            'footer_contact.max' => 'Footer Contact must have 255 char. as max',
            'footer_app_title.required' => 'Footer App Title Required',
            'footer_app_title.min' => 'Footer App Title must have 3 char.',
            'footer_app_title.max' => 'Footer App Title must have 255 char. as max',
            'footer_app_contact.required' => 'Footer App Contact Required',
            'footer_app_contact.min' => 'Footer App Contact must have 3 char.',
            'footer_app_contact.max' => 'Footer App Contact must have 255 char. as max',
            'question_img.mimes' => 'Question Image must be .png OR .jpg OR . jpeg',
            'footer_app_img.mimes' => 'Footer App Image must be .png OR .jpg OR . jpeg',

            // 'brandLogo.required' => 'Please Upload Brand Logo Required',
            // 'brandLogo.image' => 'logo must be .png',


        ]);
        if ($validate->fails()) {
            // return dd($validate->errors());
            // return response()->json(['errors'=>$validate->errors()]);
            return back()->with($validate->errors()->messages())->withInput();
        } else {
            $settings = Settings::all()->first();
        $settings->site_name = $request->site_name;
        $settings->question_home = $request->question_home;
        $settings->question_answer = $request->question_answer;
        $settings->footer_title = $request->footer_title;
        $settings->footer_contact = $request->footer_contact;
        $settings->footer_app_title = $request->footer_app_title;
        $settings->footer_app_contact = $request->footer_app_contact;
        $oldphotoPath = $settings ->question_img;

        //   return dd($oldphotoPath);

        if($request->file('question_img') != null){
            $request->validate([
                'question_img' => 'required|mimes:png,jpg'
            ]);
            $the_file_path=uploadimage('assets/img/',$request->question_img);

            $settings->question_img = $the_file_path;
                // return dd('assets/admin/uploads'.'/'.$oldphotoPath);
                // return dd(file_exists('assets/admin/uploads/'.$oldphotoPath));
                if($oldphotoPath!=null || $oldphotoPath=""){

                    if(file_exists('assets/img/'.$oldphotoPath)){
                        unlink('assets/img/'.$oldphotoPath);
                    }
                }
        }
        if($request->file('footer_app_img') != null){
            $request->validate([
                'footer_app_img' => 'required|mimes:png,jpg'
            ]);
            $the_file_path=uploadimage('assets/img/',$request->footer_app_img);

            $settings->footer_app_img = $the_file_path;
                // return dd('assets/admin/uploads'.'/'.$oldphotoPath);
                // return dd(file_exists('assets/admin/uploads/'.$oldphotoPath));
                if($oldphotoPath!=null || $oldphotoPath=""){

                    if(file_exists('assets/img/'.$oldphotoPath)){
                        unlink('assets/img/'.$oldphotoPath);
                    }
                }
        }
            $settings->save();

            return redirect()->back()->with(['success'=>'Settings Updated Successfully']);

        }

        return dd($request);
    }
}
