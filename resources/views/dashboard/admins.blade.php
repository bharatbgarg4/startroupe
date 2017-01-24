@extends('layouts.dashboard')

@section('dashboardcontent')

<table class="table table-striped">
	<tr>
		<th>Profile Image</th>
		<th>Name</th>
		<th>Username</th>
		<th>Email</th>
		<th>Registered</th>
	</tr>
@foreach($users as $user)
	<tr>
		<td><a href="/dashboard/{{$user->username}}/profile"><img src="{{$user->imgUrl}}" class="profileImage"></a></td>
		<td><a href="/dashboard/{{$user->username}}/profile">{{$user->name}}</a></td>
		<td>{{$user->username}}</td>
		<td>{{$user->email}}</td>
		<td>{{$user->created_at->diffForHumans()}}</td>
	</tr>
@endforeach
</table>

@stop