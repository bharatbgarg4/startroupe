<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Talent;
use App\Job;
use App\Location;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TalentController extends Controller
{

	public function __construct(){
		$this->middleware('admin',['only'=>['save','delete','saveLocation','deleteLocation']]);
	}

	public function all($type){
		$select_talent=array('all'=>'All')+Talent::lists('title', 'slug')->toArray();
		$select_location=array('all'=>'All')+Location::lists('title', 'slug')->toArray();
		$location=0;
		$talent=0;
		$users=0;
		$jobs=0;
		if($type=='talent'){
			$users=User::user()->get();
		}
		if($type=='jobs'){
			$jobs=Job::all();
		}
		return view('talent.index',compact('type','jobs','users','select_talent','select_location','talent','location'));
	}

	public function talent($type,Talent $talent){
		$select_talent=array('all'=>'All')+Talent::lists('title', 'slug')->toArray();
		$select_location=array('all'=>'All')+Location::lists('title', 'slug')->toArray();
		$location=0;
		$users=0;
		$jobs=0;
		if($type=='talent'){
			$users=$talent->art_users;
		}
		if($type=='jobs'){
			$jobs=$talent->jobs;
		}
		return view('talent.index',compact('type','jobs','users','select_talent','select_location','talent','location'));
	}

	public function location($type,Location $location){
		$select_talent=array('all'=>'All')+Talent::lists('title', 'slug')->toArray();
		$select_location=array('all'=>'All')+Location::lists('title', 'slug')->toArray();
		$talent=0;
		$users=0;
		$jobs=0;
		if($type=='talent'){
			$users=$location->art_users;
		}
		if($type=='jobs'){
			$jobs=$location->jobs;
		}
		return view('talent.index',compact('type','jobs','users','select_talent','select_location','talent','location'));
	}

	public function filter($type,Talent $talent, Location $location){
		$select_talent=array('all'=>'All')+Talent::lists('title', 'slug')->toArray();
		$select_location=array('all'=>'All')+Location::lists('title', 'slug')->toArray();
		$users=0;
		$jobs=0;
		if($type=='talent'){
			$users=User::where('talent_id',$talent->id)->where('location_id',$location->id)->user()->get();
		}
		if($type=='jobs'){
			$jobs=$location->jobs;
		}
		return view('talent.index',compact('type','jobs','users','select_talent','select_location','talent','location'));
	}

	public function save(Request $request)
	{
		$input=$request->all();
		if($input['title']){
			$input['slug']=str_slug($input['title']);
			if(Talent::where('slug',$input['slug'])->count()){
				return redirect()->back()->with('status-alert','Talent Already Present');
			}
			Talent::create($input);
			return redirect()->back()->with('status','Talent Created');
		}
		return redirect()->back()->with('status-danger','Title Required');
	}

	public function delete(Talent $talent){
		$talent->delete();
		return redirect()->back()->with('status-danger','Category Deleted');
	}

	public function saveLocation(Request $request)
	{
		$input=$request->all();
		if($input['title']){
			$input['slug']=str_slug($input['title']);
			if(Location::where('slug',$input['slug'])->count()){
				return redirect()->back()->with('status-alert','Location Already Present');
			}
			Location::create($input);
			return redirect()->back()->with('status','Location Created');
		}
		return redirect()->back()->with('status-danger','Title Required');
	}

	public function deleteLocation(Location $location){
		$location->delete();
		return redirect()->back()->with('status-danger','Location Deleted');
	}
}
