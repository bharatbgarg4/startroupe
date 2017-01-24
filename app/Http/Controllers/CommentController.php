<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use App\Articlecomment;
use App\Discussioncomment;
use App\Article;
use App\Discussion;
use Auth;
class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['only' => ['article','discussion']]);
        $this->middleware('owner', ['only' => ['article_delete','discussion_delete']]);
    }

    public function article(Article $article, CommentRequest $request){
        $input=$request->all();
        $input['article_id']=$article->id;
        $input['user_id']=Auth::user()->id;
        Articlecomment::create($input);
        return redirect()->back()->with('status','Comment Added');
    }

    public function article_delete(Article $article, Articlecomment $articlecomment){
        $articlecomment->delete();
        return redirect()->back()->with('status-danger', 'Comment Deleted!');
    }

    public function discussion(Discussion $discussion, CommentRequest $request){
        $input=$request->all();
        $input['discussion_id']=$discussion->id;
        $input['user_id']=Auth::user()->id;
        Discussioncomment::create($input);
        return redirect()->back()->with('status','Comment Added');
    }

    public function discussion_delete(Discussion $discussion, Discussioncomment $discussioncomment){
        $discussioncomment->delete();
        return redirect()->back()->with('status-danger', 'Comment Deleted!');
    }
}
