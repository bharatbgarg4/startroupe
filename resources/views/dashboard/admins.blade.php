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


<h4>Send SMS</h4>
{!!Form::open(['url'=>'sms'])!!}
<div class="row">
<div class="form-group col col-md-6">
{!! Form::label('Mobile') !!}
{!! Form::text('mobile',null,['placeholder'=>'Mobile','class'=>'form-control']) !!}
</div>
<div class="form-group col col-md-6">
{!! Form::label('Message') !!}
{!! Form::text('message',null,['placeholder'=>'Message','class'=>'form-control']) !!}
</div>
</div>

<div class="form-group">
	{!! Form::submit('Submit',['class'=>'btn btn-primary','name'=>"submit"]) !!}
</div>
{!!Form::close()!!}

@stop