<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function checkUser(Request $request){
        $validate = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:3',
            // 'brandLogo' => 'image|mimes:png',

        ], [
            'email.required' => 'Email Required',
            'email.email' => 'Email must be Valid Email',
            'password.required' => 'Password Required',
            'password.min' => 'Password at least 3 char.',
        ]);
            // return dd($validate->errors());
        if ($validate->fails()) {
            // return response()->json(['errors'=>$validate->errors()]);
            return back()->withErrors($validate->errors())->withInput();
        } else {
            $user = User::where('email',$request->email)->first();
            if($user){
                if($user->is_active == 1){
                    if($user->is_confirmed == 1){
                        if(Hash::check($request->password, $user->password)){
                            if($user->roles === 'doctors'){
                                Auth()->login($user);
                                return redirect()->route('doctor.dashboard');
                            }elseif($user->roles === 'admin'){
                                Auth()->login($user);
                                return redirect()->route('admin.dashboard');
                            }else{
                                Auth()->login($user);
                                return redirect()->route('user.dashboard');
                            }


                        }else{
                            return back()->withErrors(['errors' => 'Invalid Email Or Password'])->withInput();
                        }
                    }else{
                        return back()->withErrors(['errors' =>'Your Email IS Not Confirmed Yet Please Check After 24 Hours'])->withInput();
                    }
                }else{
                    return back()->withErrors(['errors' =>'Your Email Is Blocked '])->withInput();
                }
            }else{
                return back()->withErrors(['errors' =>'Invalid Email Or Password'])->withInput();
            }
            return redirect()->back()->withErrors(['success'=>'Message Sent Successfully']);

        }
    }

    public function registerUser(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'phone' => 'phone:EG',
            'password' => 'required|min:3',
            // 'brandLogo' => 'image|mimes:png',

        ], [
            'name.required' => 'Name Required',
            'name.min' => 'Name must be at least 3 char.',
            'name.max' => 'Name must be less than 255 char.',
            'email.required' => 'Email Required',
            'email.email' => 'Email must be Valid Email',
            'email.unique' => 'Email already Exists',
            'phone.phone' => 'Phone must be valid',
            'password.required' => 'Password Required',
            'password.min' => 'Password at least 3 char.',
        ]);
            // return dd($validate->errors());
        if ($validate->fails()) {
            // return response()->json(['errors'=>$validate->errors()]);
            return back()->withErrors($validate->errors())->withInput();
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->roles = 'user';
            $user->is_active = '1';
            $user->is_confirmed = '0';
            $user->save();

            // return dd($user);
            return redirect()->back()->withErrors(['success'=>'User Stored Successfully Please Wait While Confirming Your Email']);

        }
    }
}
