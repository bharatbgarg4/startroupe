@extends('layouts.dashboard')

@section('dashboardcontent')

<table class="table table-striped">
	<tr>
		<th>Profile Image</th>
		<th>Name</th>
		<th>Username</th>
		<th>Email</th>
		<th>Registered</th>
		<th>Actions</th>
	</tr>
@foreach($users as $user)
	<tr>
		<td><a href="/dashboard/{{$user->username}}/profile"><img src="{{$user->imgUrl}}" class="profileImage"></a></td>
		<td><a href="/dashboard/{{$user->username}}/profile">{{$user->name}}</a></td>
		<td>{{$user->username}}</td>
		<td>{{$user->email}}</td>
		<td>{{$user->created_at->diffForHumans()}}</td>
		<td>
			<a href="/dashboard/{{$user->username}}/makeUser" class="btn btn-default">Unssign Editor</a>
			<a href="/dashboard/{{$user->username}}/profile" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></i></a>

			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$user->id}}"><i class="fa fa-trash"></i></button>
			<div id="delete-{{$user->id}}" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-body">
			        <h4>Confirm Delete for Editor</h4>
			        <a href="/dashboard/{{$user->username}}/delete" class="btn btn-danger">Delete</a>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			      </div>
			    </div>
			  </div>
			</div>

		</td>
	</tr>
@endforeach
</table>

@stop