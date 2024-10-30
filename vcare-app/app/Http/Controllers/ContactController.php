<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $settings = Settings::all()->Last();

        return view('frontend.contact',['settings'=>$settings]);
    }


    public function sendMessage(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'phone' => 'phone:EG',
            'email' => 'required|email:rfc,dns',
            'subject' => 'required|min:3',
            'message' => 'required|min:3'
            // 'brandLogo' => 'image|mimes:png',

        ], [
            'name.required' => 'Name Required',
            'name.min' => 'Name must have 3 char.',
            'name.max' => 'Name must have 255 char. as max',
            'phone.phone' => 'Phone must be Valid Number',
            'email.required' => 'Email Required',
            'email.email' => 'Email must be Valid',
            'subject.required' => 'Subject Required',
            'subject.min' => 'Subject at least 3 char.',
            'message.required' => 'Message Required',
            'message.min' => 'Message at least 3 char.',

            // 'brandLogo.required' => 'Please Upload Brand Logo Required',
            // 'brandLogo.image' => 'logo must be .png',
            // 'brandLogo.mimes' => 'logo must be .png',


        ]);
            // return dd($validate->errors());
        if ($validate->fails()) {
            // return response()->json(['errors'=>$validate->errors()]);
            return back()->withErrors($validate->errors())->withInput();
        } else {
            $message = new Messages;
            $message->name = $request->name;
            $message->phone = $request->phone;
            $message->email = $request->email;
            $message->subject = $request->subject;
            $message->message = $request->message;
            $message->user_id = auth()->user()->id;
            $message->is_readed = '0';
            // return dd($message);

            $message->save();
            return redirect()->back()->withErrors(['success'=>'Message Sent Successfully']);

        }
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
