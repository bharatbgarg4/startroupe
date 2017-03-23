@extends('layouts.page')

@section('pagecontent')

<div class="row dashboard">
	<div class="col col-sm-3 sidebar">
		@if(Auth::check())
		<div class="tope">
		<div class="tope-img">	<img src="{{Auth::user()->imgUrl}}" alt=""></div>
			<div class="tope-head">	<h4>{{Auth::user()->name}}</h4>
			<p>{{Auth::user()->bio}}</p></div>

		</div>
		@if(Auth::user()->admin)
		<ul class="list-group">
			<li class="list-group-item">
				<span class="badge" style="padding: 8px;border-radius: 5px;">
					 {{$count['admins']}}
				</span>
				<a href="/dashboard/admins"><i class="fa fa-user-secret"></i>Admins</a>
			</li>
			<li class="list-group-item">
				<span class="badge" style="padding: 8px;border-radius: 5px;">
					 {{$count['editors']}}
				</span>
				<a href="/dashboard/editors"><i class="fa fa-group" aria-hidden="true"></i>Businesses</a>
			</li>
			<li class="list-group-item">
				<span class="badge" style="padding: 8px;border-radius: 5px;">
					  {{$count['users']}}
				</span>
				<a href="/dashboard/users"><i class="fa fa-group" aria-hidden="true"></i> Troupes</a>
			</li>
			<li class="list-group-item">
				<a href="/dashboard/user/create"><i class="fa fa-user-plus" aria-hidden="true"></i>
				User</a>
			</li>
			<li class="list-group-item">
				<a href="/dashboard/images"><i class="fa fa-picture-o" aria-hidden="true"></i> Images</a>
			</li>
			<li class="list-group-item">
				<a href="/dashboard/autocomplete"><i class="fa fa-file-text-o" aria-hidden="true"></i> Autocomplete</a>
			</li>
		</ul>
		@endif
		<ul class="list-group">
			<li class="list-group-item">
				<a href="/dashboard/{{Auth::user()->username}}/profile"><i class="fa fa-user fa-6" aria-hidden="true"></i>Profile</a>
			</li>
			@if(Auth::user()->editor or Auth::user()->admin)
			<li class="list-group-item">
				<a href="/dashboard/jobs"><i class="fa fa-briefcase" aria-hidden="true"></i>Jobs</a>
			</li>
			@endif
			@if(!Auth::user()->editor or Auth::user()->admin)
			<li class="list-group-item">
				<a href="/dashboard/applied"><i class="fa fa-history" aria-hidden="true"></i>Jobs Applied</a>
			</li>
			@endif
			<li class="list-group-item">
				<a href="/dashboard/applied"><i class="fa fa-picture-o" aria-hidden="true"></i>Portfolio</a>
			</li>
			<li class="list-group-item">
				<a href="/dashboard/applied"><i class="fa fa-info" aria-hidden="true"></i>account info</a>
			</li>
		</ul>
		@endif
	</div>
	<div class="col col-sm-9 dashboard-inner">
		@yield('dashboardcontent')
	</div>
</div>

@stop