<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Offer;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function save(Request $request){
    	$input=$request->all();
        $input['user_id']=Auth::user()->id;
        Job::create($input);
        return redirect('dashboard/jobs')->with('status','Job Created');
    }

    public function show(Job $job){
        $similar=Job::where('location_id',$job->location_id)->where('talent_id',$job->talent_id)->get();
        $similar=$similar->diff(Job::where('id',$job->id)->get());
        return view('pages.job',compact('job','similar'));
    }

    public function delete(Job $job){
        $job->delete();
        return redirect('jobs')->with('status-danger','Job Deleted');
    }

    public function apply(Job $job,Request $request){
        $input=$request->all();
        Offer::create(['content'=>$input['content'],'user_id'=>Auth::user()->id,'job_id'=>$job->id]);
        return redirect()->back()->with('status','Applied');
    }
}
