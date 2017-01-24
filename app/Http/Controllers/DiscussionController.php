<?php

namespace App\Http\Controllers;

use Auth;
use App\Discussion;
use App\Http\Requests\DiscussionRequest;
use App\Http\Controllers\Controller;

class DiscussionController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['only' => ['create','store']]);
        $this->middleware('owner', ['only' => ['delete']]);
    }

    public function index(){
        $discussions=Discussion::latest()->get();
        return view('discussions.index',compact('discussions'));
    }

    public function show(Discussion $discussion){
        $comments=$discussion->comments()->latest()->get();
        $element=$discussion;
        $elementname="discussion";
        return view('discussions.show',compact('discussion','element','elementname','comments'));
    }

    public function create(){
        return view('discussions.create');
    }

    public function store(DiscussionRequest $request){
        $input=$request->all();
        $val=$input['title'];
        $input['slug']=str_slug($val);
        if(Discussion::where('slug',$input['slug'])->exists()){
            $input['slug']=$input['slug'].'-'.strtolower(str_random(4));
        }
        $input['user_id']=Auth::user()->id;
        Discussion::create($input);
        return redirect('dashboard/'.Auth::user()->username.'/discussions')->with('status','Discussion Created');
    }

    public function delete(Discussion $discussion){
        $discussion->delete();
        return redirect('discussions')->with('status-danger','Discussion Deleted');
    }
}
