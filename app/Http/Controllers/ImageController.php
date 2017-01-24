<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Http\Controllers\Controller;
use App\Image;
use File;

class ImageController extends Controller
{
    public function __construct(){
        $this->middleware('editor');
        $this->middleware('admin', ['only' => ['delete']]);
    }

    public function index(){
        $images=Image::latest()->get();
        return view('dashboard.images',compact('images'));
    }
    public function store(ImageRequest $request){
        $input=$request->all();
        $name=str_slug($input['title']).'-'.str_random(8);
        $imageName = $name.'.'.$request->file('image_file')->getClientOriginalExtension();
        $request->file('image_file')->move(
        base_path() . '/public/uploads/images/',$imageName);
        $input['url']='/uploads/images/'.$imageName;
        Image::create($input);
        return redirect()->back()->with('status','Image Uploaded');
    }

    public function delete($id){
        $image=Image::where('id',$id)->firstorfail();
        File::delete(base_path().'/public'.$image->url);
        $image->delete();
        return redirect()->back()->with('status-danger','Image Deleted');
    }
}
