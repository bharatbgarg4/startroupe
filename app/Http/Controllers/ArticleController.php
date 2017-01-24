<?php

namespace App\Http\Controllers;

use Auth;
use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('editor', ['only' => ['create','store']]);
        $this->middleware('owner', ['only' => ['edit','update','delete']]);
    }

    public function index(){
        $articles=Article::latest()->get();
        return view('articles.index',compact('articles'));
    }

    public function show(Article $article){
        $comments=$article->comments()->latest()->get();
        $element=$article;
        $elementname="article";
        return view('articles.show',compact('article','element','elementname','comments'));
    }

    public function create(){
        return view('articles.create');
    }

    public function store(ArticleRequest $request){
        $input=$request->all();
        if(!$input['slug']){
            $val=$input['title'];
            $input['slug']=str_slug($val);
            if(Article::where('slug',$input['slug'])->exists()){
                $input['slug']=$input['slug'].'-2';
            }
        }
        $input['user_id']=Auth::user()->id;
        Article::create($input);
        return redirect('dashboard/'.Auth::user()->username.'/articles')->with('status','Article Created');
    }

    public function edit(Article $article){
        return view('articles.edit',compact('article'));
    }

    public function update(Article $article, ArticleRequest $request){
        $input=$request->all();
        if(!$input['slug']){
            $val=$input['title'];
            $input['slug']=str_slug($val);
            if(Article::where('slug',$input['slug'])->exists()){
                $input['slug']=$input['slug'].'-2';
            }
        }
        $article->update($input);
        return redirect('article/'.$article->slug)->with('status','Article Updated');
    }

    public function delete(Article $article){
        $article->delete();
        return redirect('articles')->with('status-danger','Article Deleted');
    }
}
