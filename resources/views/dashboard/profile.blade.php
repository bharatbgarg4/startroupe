@extends('layouts.dashboard')

@section('dashboardcontent')



<div class="row">
	<div class="col col-md-5">
		<div class="profile">
			<img src="{{$user->imgUrl}}" class="profileImage">
			<p>Name : <b>{{$user->name}}</b></p>
			<a href="/profile/{{$user->username}}" class="btn btn-danger">Public Profile</a>
			<p>Email : <b>{{$user->email}}</b></p>
			<p>Bio : <b>{{$user->bio}}</b></p>
			<p>Username : <b>{{$user->username}}</b></p>
			<p>Date of Birth : <b>{{$user->birthDate}}</b></p>
			<p>Registered : <b>{{$user->created_at->diffForHumans()}}</b></p>
			<hr>

			<p>Talent:
				@if($user->talent)
				<b> {{$user->talent->title}}</b>
				@endif
			</p>
			<p>Location:
				@if($user->location)
				<b>{{$user->location->title}}</b>
				@endif
			</p>

			<hr>
			<h4>Social Links</h4>
			<p>Facebook : <b>{{$user->facebook}}</b></p>
			<p>Twitter : <b>{{$user->twitter}}</b></p>
			<p>LinkedIn : <b>{{$user->linkedin}}</b></p>
			<p>Youtube : <b>{{$user->youtube}}</b></p>
			<hr>

			<h4>Work Experience</h4>
			<p>Last Job : <b>{{$user->lastJob}}</b></p>
			<p>Last Job Details : <b>{{$user->lastJobDetails}}</b></p>
			<p>Company : <b>{{$user->company}}</b></p>

			<hr>

			<h4>Details</h4>
			<p>Height : <b>{{$user->height}}</b></p>
			<p>Waist : <b>{{$user->waist}}</b></p>
			<p>Hips : <b>{{$user->hips}}</b></p>
			<p>Chest : <b>{{$user->chest}}</b></p>
			<p>Skin Color : <b>{{$user->skinColor}}</b></p>
			<p>Eyes Color : <b>{{$user->eyesColor}}</b></p>
			<p>Hair Color : <b>{{$user->hairColor}}</b></p>

			<p>Language : <b>{{$user->language}}</b></p>

			<p>Married : <b>@if($user->married) Yes @else No @endif</b></p>
			<p>Willing To Travel : <b>@if($user->travel) Yes @else No @endif</b></p>

			<a href="#" class="btn btn-primary" id="EditProfile">Edit Profile</a>
			<a href="#" class="btn btn-primary" id="ChangePassword">Change Password</a>
		</div>
	</div>
	<div class="col col-md-5">

		<div id="EditProfileForm">
			<h1>Edit Profile</h1>
			{!!Form::model($user,['url'=>'dashboard/'.$user->username,'method'=>'patch','files' => true])!!}
			<div class="form-group">
				<label>Name</label>
				{!! Form::text('name',null,['placeholder'=>'Name','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Username</label>
				{!! Form::text('username',null,['placeholder'=>'Username','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Bio</label>
				{!! Form::text('bio',null,['placeholder'=>'Bio','class'=>'form-control']) !!}
			</div>

			<div class="row">
				<div class="form-group col col-md-6">
					{!! Form::label('Talent') !!}
					{!! Form::select('talent_id',$select_talent,null , ['class'=>'form-control']) !!}
				</div>
				<div class="form-group col col-md-6">
					{!! Form::label('Location') !!}
					{!! Form::select('location_id',$select_location,null , ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="form-group">
				<label>Date of Birth</label>
				{!! Form::text('birthDate',null,['placeholder'=>'Date of Birth','class'=>'form-control','id'=>'datepicker']) !!}
			</div>

			<div class="form-group">
				<label>Facebook Link</label>
				{!! Form::text('facebook',null,['placeholder'=>'Facebook Link','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Twitter Link</label>
				{!! Form::text('twitter',null,['placeholder'=>'Twitter Link','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>LinkedIn Link</label>
				{!! Form::text('linkedin',null,['placeholder'=>'LinkedIn Link','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Youtube Link</label>
				{!! Form::text('youtube',null,['placeholder'=>'Youtube Link','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Last Job</label>
				{!! Form::text('lastJob',null,['placeholder'=>'Last Job','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Last Job Details</label>
				{!! Form::text('lastJobDetails',null,['placeholder'=>'Last Job Details','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Company</label>
				{!! Form::text('company',null,['placeholder'=>'Company','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Height</label>
				{!! Form::text('height',null,['placeholder'=>'Height','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Weight</label>
				{!! Form::text('weight',null,['placeholder'=>'Weight','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Hips</label>
				{!! Form::text('hips',null,['placeholder'=>'Hips','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Chest</label>
				{!! Form::text('chest',null,['placeholder'=>'Chest','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Skin Color</label>
				{!! Form::text('skinColor',null,['placeholder'=>'Skin Color','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Eyes Color</label>
				{!! Form::text('eyesColor',null,['placeholder'=>'Eyes Color','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Hair Color</label>
				{!! Form::text('hairColor',null,['placeholder'=>'Hair Color','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Language</label>
				{!! Form::text('language',null,['placeholder'=>'Language','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Married</label>
				<p>Yes	{!! Form::radio('married', 1, !!$user->married) !!}	</p>
				<p>No	{!! Form::radio('married', 0, !$user->married) !!}	</p>
			</div>

			<div class="form-group">
				<label>Willing to Travel</label>
				<p>Yes	{!! Form::radio('travel', 1, !!$user->travel) !!}	</p>
				<p>No	{!! Form::radio('travel', 0, !$user->travel) !!}	</p>
			</div>

			<div class="form-group">
				{!! Form::label('Image') !!}
				{!! Form::file('imgUrl', null,['class'=>'btn btn-primary']) !!}
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary form-control">Update</button>
			</div>
			{!! Form::close() !!}
			<a href="#" class="btn btn-warning pull-right canceledit">Cancel</a>
		</div>

		<div id="ChangePasswordForm">
			<h1>Change Password</h1>
			{!!Form::model($user,['url'=>'dashboard/'.$user->username.'/password','method'=>'patch'])!!}
			<div class="form-group">
				<label>Password</label>
				{!! Form::password('password',['placeholder'=>'New Password','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<label>Confirm Password</label>
				{!! Form::password('password_confirmation',['placeholder'=>'Confirm New Password','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary form-control">Update</button>
			</div>
			{!! Form::close() !!}
			<a href="#" class="btn btn-warning pull-right canceledit">Cancel</a>
		</div>

	</div>
</div>
@stop