@extends('layouts.page')

@section('pagecontent')

<div class="row dashboard">
	<div class="col col-sm-3 sidebar">
		@if(Auth::check())
		<div class="tope">
			<img src="{{Auth::user()->imgUrl}}" alt="">
			<h4>{{Auth::user()->name}}</h4>
			<p>{{Auth::user()->bio}}</p>
		</div>
		@if(Auth::user()->admin)
		<ul class="list-group">
			<li class="list-group-item">
				<span class="badge" style="padding: 8px;border-radius: 5px;">
					<i class="fa fa-user-secret"></i> {{$count['admins']}}
				</span>
				<a href="/dashboard/admins">Admins</a>
			</li>
			<li class="list-group-item">
				<span class="badge" style="padding: 8px;border-radius: 5px;">
					<i class="fa fa-smile-o"></i> {{$count['editors']}}
				</span>
				<a href="/dashboard/editors">Businesses</a>
			</li>
			<li class="list-group-item">
				<span class="badge" style="padding: 8px;border-radius: 5px;">
					<i class="fa fa-users"></i> {{$count['users']}}
				</span>
				<a href="/dashboard/users">Troupes</a>
			</li>
			<li class="list-group-item">
				<a href="/dashboard/user/create"><i class="fa fa-plus"></i> User</a>
			</li>
			<li class="list-group-item">
				<a href="/dashboard/images">Images</a>
			</li>
			<li class="list-group-item">
				<a href="/dashboard/autocomplete">Autocomplete</a>
			</li>
		</ul>
		@endif
		<ul class="list-group">
			<li class="list-group-item">
				<a href="/dashboard/{{Auth::user()->username}}/profile">Profile</a>
			</li>
			@if(Auth::user()->editor or Auth::user()->admin)
			<li class="list-group-item">
				<a href="/dashboard/jobs">Jobs</a>
			</li>
			@endif
			@if(!Auth::user()->editor or Auth::user()->admin)
			<li class="list-group-item">
				<a href="/dashboard/applied">Jobs Applied</a>
			</li>
			@endif
		</ul>
		@endif
	</div>
	<div class="col col-sm-9">
		@yield('dashboardcontent')
	</div>
</div>

@stop