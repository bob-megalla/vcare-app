<?php

namespace App\Http\Controllers\admin;

use App\Models\Messages;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    //
    public function AllMessages(){
        $settings = Settings::all()->first();
        $messages = Messages::all();
        return view('backend.admin.messages',compact('settings','messages'));
    }

    public function ReadMessages($id){
        $settings = Settings::all()->first();
        $messages = Messages::where('id',$id)->first();
        $messages->is_readed = "1";
        $messages->save();
        return view('backend.admin.messages.getMessage',compact('settings','messages'));
    }

    public function DeleteMessages($id){
        $messages = Messages::where('id',$id)->first()->delete();
        return redirect()->back()->with(['success'=>'Message deleted successfully']);
    }
}
