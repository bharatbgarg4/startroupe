@extends('layouts.dashboard')

@section('dashboardcontent')



<div class="row">
	<div class="col col-md-12">
		<div class="profile">
			<div class="profile-top">
				<div class="col col-md-4 profile-img">
					<img src="{{$user->imgUrl}}" class="profileImage"></div>
					<div class="col col-md-8 profile-text"><a href="/profile/{{$user->username}}" class="btn btn-danger public-pro">Public Profile</a><h2>{{$user->name}}</h2>
						<p class="loc"><i class="fa fa-map-marker"></i>@if($user->location)
							{{$user->location->title}}
							@endif
						</p>
						<p>Talent:
							@if($user->talent)
							<b> {{$user->talent->title}}</b>
							@endif
						</p>

						<p>Email : <b>{{$user->email}}</b></p>
						<p>Bio : <b>{{$user->bio}}</b></p>
						<p>Username : <b>{{$user->username}}</b></p>
						<p>Date of Birth : <b>{{$user->birthDate}}</b></p>
						<p>Registered : <b>{{$user->created_at->diffForHumans()}}</b></p>
					</div>
				</div>
				<div class="tabs-profile">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#social11">Social link</a></li>

						<li><a data-toggle="tab" href="#work12">Work Experience</a></li>
						<li><a data-toggle="tab" href="#details13">Details</a></li>
					</ul>

					<div class="tab-content">
						<div id="social11" class="tab-pane fade in active">

							<p>Facebook : <b>{{$user->facebook}}</b></p>
							<p>Twitter : <b>{{$user->twitter}}</b></p>
							<p>LinkedIn : <b>{{$user->linkedin}}</b></p>
							<p>Youtube : <b>{{$user->youtube}}</b></p>
						</div>

						<div id="work12" class="tab-pane fade">

							<p>Last Job : <b>{{$user->lastJob}}</b></p>
							<p>Last Job Details : <b>{{$user->lastJobDetails}}</b></p>
							<p>Company : <b>{{$user->company}}</b></p>
						</div>

						<div id="details13" class="tab-pane fade">

							<div class="col col-md-6">
								<p>Height : <b>{{$user->height}}</b></p></div>
							<div class="col col-md-6">
								<p>Waist : <b>{{$user->waist}}</b></p>
							</div>
							<div class="col col-md-6">
								<p>Hips : <b>{{$user->hips}}</b></p>
							</div>
							<div class="col col-md-6">
								<p>Chest : <b>{{$user->chest}}</b></p>
							</div>
							<div class="col col-md-6">
								<p>Skin Color : <b>{{$user->skinColor}}</b></p>
							</div>
							<div class="col col-md-6">
								<p>Eyes Color : <b>{{$user->eyesColor}}</b></p>
								</div>
								<div class="col col-md-6">
								<p>Hair Color : <b>{{$user->hairColor}}</b></p>
							</div>
							<div class="col col-md-6">
								<p>Language : <b>{{$user->language}}</b></p>
							</div>
							<div class="col col-md-6">
								<p>Married : <b>@if($user->married) Yes @else No @endif</b></p>
							</div>
							<div class="col col-md-6">
								<p>Willing To Travel : <b>@if($user->travel) Yes @else No @endif</b></p>
							</div>


							</div>

						</div>
						<div>
						</div>
					</div>

					<hr>



					<hr>


				</div>
				<a href="#" class="btn btn-primary" id="EditProfile">Edit Profile</a>
										<a href="#" class="btn btn-primary" id="ChangePassword">Change Password</a>
			</div>
			<div class="col col-md-12">

				<div id="EditProfileForm">
					<h2>Edit Profile</h2>
					{!!Form::model($user,['url'=>'dashboard/'.$user->username,'method'=>'patch','files' => true])!!}
					<div class="col col-md-6 form-group">
						<label>Name</label>
						{!! Form::text('name',null,['placeholder'=>'Name','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Username</label>
						{!! Form::text('username',null,['placeholder'=>'Username','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Bio</label>
						{!! Form::text('bio',null,['placeholder'=>'Bio','class'=>'form-control']) !!}
					</div>


						<div class="form-group col col-md-6">
							{!! Form::label('Talent') !!}
							{!! Form::select('talent_id',$select_talent,null , ['class'=>'form-control']) !!}
						</div>
						<div class="form-group col col-md-6">
							{!! Form::label('Location') !!}
							{!! Form::select('location_id',$select_location,null , ['class'=>'form-control']) !!}
						</div>


					<div class="col col-md-6 form-group">
						<label>Date of Birth</label>
						{!! Form::text('birthDate',null,['placeholder'=>'Date of Birth','class'=>'form-control','id'=>'datepicker']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Facebook Link</label>
						{!! Form::text('facebook',null,['placeholder'=>'Facebook Link','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Twitter Link</label>
						{!! Form::text('twitter',null,['placeholder'=>'Twitter Link','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>LinkedIn Link</label>
						{!! Form::text('linkedin',null,['placeholder'=>'LinkedIn Link','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Youtube Link</label>
						{!! Form::text('youtube',null,['placeholder'=>'Youtube Link','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Last Job</label>
						{!! Form::text('lastJob',null,['placeholder'=>'Last Job','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Last Job Details</label>
						{!! Form::text('lastJobDetails',null,['placeholder'=>'Last Job Details','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Company</label>
						{!! Form::text('company',null,['placeholder'=>'Company','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Height</label>
						{!! Form::text('height',null,['placeholder'=>'Height','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Weight</label>
						{!! Form::text('weight',null,['placeholder'=>'Weight','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Hips</label>
						{!! Form::text('hips',null,['placeholder'=>'Hips','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Chest</label>
						{!! Form::text('chest',null,['placeholder'=>'Chest','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Skin Color</label>
						{!! Form::text('skinColor',null,['placeholder'=>'Skin Color','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Eyes Color</label>
						{!! Form::text('eyesColor',null,['placeholder'=>'Eyes Color','class'=>'form-control']) !!}
					</div>

					<div class="fcol col-md-6 form-group">
						<label>Hair Color</label>
						{!! Form::text('hairColor',null,['placeholder'=>'Hair Color','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Language</label>
						{!! Form::text('language',null,['placeholder'=>'Language','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group radiob">
						<label>Married</label>
						<div class="col col-md-6">	{!! Form::radio('married', 1, !!$user->married) !!}	Yes
						</div>
						<div class="col col-md-6">{!! Form::radio('married', 0, !$user->married) !!}	No
						</div>
					</div>

					<div class="col col-md-6 form-group radiob">
						<label>Willing to Travel</label>
						<div class="col col-md-6">{!! Form::radio('travel', 1, !!$user->travel) !!} Yes
						</div>
						<div class="col col-md-6">{!! Form::radio('travel', 0, !$user->travel) !!}	No	</div>
					</div>

					<div class="col col-md-6 form-group">
						{!! Form::label('Image') !!}
						{!! Form::file('imgUrl', null,['class'=>'btn btn-primary']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<button type="submit" class="btn btn-primary form-control">Update</button>
					</div>
					{!! Form::close() !!}
					<a href="#" class="btn btn-warning pull-right canceledit">Cancel</a>
				</div>

				<div id="ChangePasswordForm">
					<h2>Change Password</h2>
					{!!Form::model($user,['url'=>'dashboard/'.$user->username.'/password','method'=>'patch'])!!}
					<div class="col col-md-6 form-group">
						<label>Password</label>
						{!! Form::password('password',['placeholder'=>'New Password','class'=>'form-control']) !!}
					</div>

					<div class="col col-md-6 form-group">
						<label>Confirm Password</label>
						{!! Form::password('password_confirmation',['placeholder'=>'Confirm New Password','class'=>'form-control']) !!}
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary form-control update-btn">Update</button><a href="#" class="btn btn-warning pull-right canceledit">Cancel</a>
					</div>
					{!! Form::close() !!}

				</div>

			</div>
		</div>
		@stop