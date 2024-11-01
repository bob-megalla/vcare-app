<?php

namespace App\Http\Controllers\admin;

use App\Models\News;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    //
    public function AllNews(){
        $settings = Settings::all()->first();
        $news = News::all();
        return view('backend.admin.news', compact('news', 'settings'));
        // return view('');
    }
    public function AddNews(){
        $settings = Settings::all()->first();
        return view('backend.admin.news.AddNews',compact('settings'));
    }

    public function StoreAddNews(Request $request){
        // return dd($request);
        $validate = Validator::make($request->all(), [
            'img_link' => 'required|min:3|max:255',
            'title_news' => 'required|min:3|max:255',
            'contact_news' => 'required|min:3|max:255',
            'published' => 'required|numeric',

        ], [
            'img_link.required' => 'Image Link Required',
            'img_link.min' => 'Image Link must have 3 char.',
            'img_link.max' => 'Image Link must have 255 char. as max',
            'title_news.required' => 'Title News Required',
            'title_news.min' => 'Title News must have 3 char.',
            'title_news.max' => 'Title News must have 255 char. as max',
            'contact_news.required' => 'Contact News Required',
            'contact_news.min' => 'Contact News must have 3 char.',
            'contact_news.max' => 'Contact News must have 255 char. as max',
            'published.required' => 'Published Required',
            'published.numeric' => 'Published Must Be a Number',
        ]);
        if ($validate->fails()) {
            // return dd($validate->errors()->messages());
            // return response()->json(['errors'=>$validate->errors()]);
            return back()->with($validate->errors()->messages())->withInput();
        } else {
            $news = new News;
            // return dd($news);
            $news->img_link = $request->img_link;
            $news->title_news = $request->title_news;
            $news->contact_news = $request->contact_news;
            $news->published = $request->published;
            $news->save();
            return redirect()->back()->with(['success'=>'News Add Successfully']);

        }
    //    return dd($request);
    }
    public function EditNews($id){
        $settings = Settings::all()->first();
        $news = News::where('id',$id)->first();
        return view('backend.admin.news.EditNews',compact('settings','news'));
    }

    public function StoreEditNews(Request $request){
        $validate = Validator::make($request->all(), [
            'img_link' => 'required|min:3|max:255',
            'title_news' => 'required|min:3|max:255',
            'contact_news' => 'required|min:3|max:255',
            'published' => 'required|numeric',

        ], [
            'img_link.required' => 'Image Link Required',
            'img_link.min' => 'Image Link must have 3 char.',
            'img_link.max' => 'Image Link must have 255 char. as max',
            'title_news.required' => 'Title News Required',
            'title_news.min' => 'Title News must have 3 char.',
            'title_news.max' => 'Title News must have 255 char. as max',
            'contact_news.required' => 'Contact News Required',
            'contact_news.min' => 'Contact News must have 3 char.',
            'contact_news.max' => 'Contact News must have 255 char. as max',
            'published.required' => 'Published Required',
            'published.numeric' => 'Published Must Be a Number',
        ]);
        if ($validate->fails()) {
            // return dd($validate->errors()->messages());
            // return response()->json(['errors'=>$validate->errors()]);
            return back()->with($validate->errors()->messages())->withInput();
        } else {
            $news = News::where('id',$request->id)->first();
            // return dd($news);
            $news->img_link = $request->img_link;
            $news->title_news = $request->title_news;
            $news->contact_news = $request->contact_news;
            $news->published = $request->published;
            $news->save();
            return redirect()->back()->with(['success'=>'News Updated Successfully']);

        }
    }

    public function DeleteNews($id){
        $news = News::where('id',$id)->first()->delete();
        return redirect()->back()->with(['success'=>'News Deleted Successfully']);
    }
}
