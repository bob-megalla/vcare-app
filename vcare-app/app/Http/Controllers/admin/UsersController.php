<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Doctors;
use App\Models\Messages;
use App\Models\Settings;
use App\Models\BookedDoctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //
    public function AllUsers(){
        $settings = Settings::all()->first();
        $user = User::all();
        return view('backend.admin.users', compact('user', 'settings'));
    }

    public function AddUsers(){
        $settings = Settings::all()->first();
        return view('backend.admin.users.AddUsers', compact('settings'));
    }

    public function StoreAddUsers(Request $request){
        // return dd($request);
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'phone' => 'phone:EG',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:3|max:255',
            'roles' => 'required',
            'active' => 'required|numeric',
            'confirm' => 'required|numeric',

        ], [
            'name.required' => 'Name Required',
            'name.min' => 'Name must have 3 char.',
            'name.max' => 'Name must have 255 char. as max',
            'phone.phone' => 'Phone Must be Valid',
            'email.required' => 'Email Required',
            'email.email' => 'Email must be Valid Email',
            'email.unique' => 'Email already Exists',
            'password.required' => 'Password Required',
            'password.min' => 'Password at least 3 char.',
            'roles.required' => 'Select Roles',
        ]);
        if ($validate->fails()) {
            // return dd($validate->errors()->messages());
            // return response()->json(['errors'=>$validate->errors()]);
            return back()->with($validate->errors()->messages())->withInput();
        } else {
            $users = new User;
            // return dd($users);
            $users->name = $request->name;
            $users->phone = $request->phone;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->roles = $request->roles;
            $users->is_active = $request->active;
            $users->is_confirmed = $request->confirm;
            $users->save();
            return redirect()->back()->with(['success'=>'User Add Successfully']);

        }
    }

    public function EditUsers($id){
        $settings = Settings::all()->first();
        $users = User::where('id',$id)->first();
        return view('backend.admin.users.EditUsers',compact('settings','users'));
    }

    public function StoreEditUsers(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'phone' => 'phone:EG',
            // 'email' => 'required|email:rfc,dns',
            // 'password' => 'min:3|max:255',
            'roles' => 'required',
            'active' => 'required|numeric',
            'confirm' => 'required|numeric',

        ], [
            'name.required' => 'Name Required',
            'name.min' => 'Name must have 3 char.',
            'name.max' => 'Name must have 255 char. as max',
            'phone.phone' => 'Phone Must be Valid',
            // 'email.required' => 'Email Required',
            // 'email.email' => 'Email must be Valid Email',
            // 'password.max' => 'Password must have 255 char. as max',
            // 'password.min' => 'Password at least 3 char.',
            'roles.required' => 'Select Roles',
        ]);
        if ($validate->fails()) {
            // return dd($validate->errors()->messages());
            // return response()->json(['errors'=>$validate->errors()]);
            return back()->with($validate->errors()->messages())->withInput();
        } else {
            $users = User::where('id',$request->id)->first();
            // return dd($request);
            $users->name = $request->name;
            $users->phone = $request->phone;
            $users->email = $request->email;
            if(empty($request->password)){
                $users->password = $users->password;
            }else{
                $users->password = Hash::make($request->password);
            }
            $users->roles = $request->roles;
            $users->is_active = $request->active;
            $users->is_confirmed = $request->confirm;
            $users->save();
            $doctors = Doctors::where('user_id',$request->id)->first();
            if($doctors){
                $doctors->name_doctor = $request->name;
                $doctors->save();
            }
            return redirect()->back()->with(['success'=>'User Add Successfully']);

        }
    }

    public function DeleteUsers($id){
        $user = User::where('id',$id)->first();
        if($user->roles == "user"){
            $booked = BookedDoctor::where('user_id',$id)->get();
                foreach($booked as $book){
                    $book->delete();
                }
                    $msg = Messages::where('user_id',$id)->get();
                    foreach ($msg as $msg){
                    $msg->delete();
                        }
                    }
        if($user->roles == "doctors"){
            $doctor = Doctors::where('user_id',$id)->first();
            // $oldphotoPath = $doctor->img_doctor;
            // if($oldphotoPath!=null || $oldphotoPath=""){

            //     if(file_exists('assets/img/doctors'.$oldphotoPath)){
            //         unlink('assets/img/doctors'.$oldphotoPath);
            //     }
            // }
            $booked = BookedDoctor::where('doctor_id',$id)->get();
                foreach($booked as $book){
                    $book->delete();
                }
                if($doctor){
                    $doctor->delete();
                }

        }

        $user = User::where('id',$id)->first()->delete();
        return redirect()->back()->with(['success'=>'User And Related Delete Successfully']);
    }
}
