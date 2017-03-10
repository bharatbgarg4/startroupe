@extends('mainHome')

@section('maincontent')
<div class="profile">
	<div class="profile-main"><div class="profile-banner"></div>
	<div class="banner-head"><h4>{{$user->name}}</h4>
		<div class="righti">

			@if($user->location)
			<p><i class="fa fa-map-marker"></i> {{$user->location->title}}</p>
			@endif

		</div></div></div>
		<div class="container">
			<div class="row">
				<div class="col col-sm-3 profile-sidebar">
					<div class="topi">
						<div class="lefti">
							<img src="{{$user->imgUrl}}" class="profileImage"><p><i class="fa fa-eye"></i> Profile Views : {{$user->views}}</p>

						</div>

					</div>
					<!--<h4>{{$user->name}}</h4>-->
					<!--<p><i class="fa fa-eye"></i> Profile Views : {{$user->views}}</p>-->
					<div class="profile-data">

						<div class="like-thumb">
							<p>@if($liked)

								<a href="/profile/{{$user->username}}/unlike">
									<i class="fa fa-heart"></i>
									<span>Likes&nbsp;{{$user->likes}}</span></a>
									<i class="fa fa-check" style="color:green;float:right"></i>
									@else
									<a href="/profile/{{$user->username}}/like"> <i class="fa fa-heart-o"></i> <span>Likes&nbsp; {{$user->likes}} </span></a>
									@endif
								</p>
							</div><div class="like-thumb">
							<h4>About</h4>
							<p>{{$user->bio}}</p></div><div class="like-thumb">

							<ul><li>
								@if($user->facebook)
								<span class="lin"><a href="{{$user->facebook}}"><i class="fa fa-facebook"></i></a></span>
								@endif
							</li><li>
							@if($user->twitter)
							<span class="lin"><a href="{{$user->twitter}}"><i class="fa fa-twitter"></i></a></span>
							@endif
						</li><li>
						@if($user->linkedin)
						<span class="lin"><a href="{{$user->linkedin}}"><i class="fa fa-linkedin"></i></a></span>
						@endif
					</li>
					<li>
						@if($user->youtube)
						<span class="lin"><a href="{{$user->youtube}}"><i class="fa fa-youtube"></i></a></span>
						@endif</li></ul></div>

					</div>
			<!--<h4>Work Experience</h4>
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
			<p>Willing To Travel : <b>@if($user->travel) Yes @else No @endif</b></p>-->
		</div>
		<div class="col col-sm-9 portfolio">
			<div class="portflio-link">
				<h2>@if($user->talent)
					{{$user->talent->title}}
					@endif
				</h2>
				</div>
				<div class="portflio-link">
					<h3>Images portfolio
					</h3>
					<div class="images">
									@if($owner)
									{!! Form::open(array('url'=>'folio/'.$user->username,'method'=>'POST', 'files'=>true)) !!}
									<div class="form-group">
										{!! Form::file('images[]', array('multiple'=>true)) !!}
									</div>
									<div class="form-group">
										{!! Form::submit('Upload',['class'=>'btn btn-primary','name'=>"submit"]) !!}
									</div>
									{!!Form::close()!!}
									@endif
									@foreach($images as $image)
									<img src="{{$image->url}}" class="folioImage">
									@endforeach
									<div class="river">
										<img src="" class="waterImage">
									</div>
								</div>
							</div>
							<div class="portflio-link">
								<h3>Video portfolio
								</h3>
								<div class="videos">
									@if($owner)
									{!! Form::open(array('url'=>'folio/video/'.$user->username,'method'=>'POST')) !!}
									<div class="form-group">
										{!! Form::label('Youtube Video Link') !!}
										{!! Form::text('url',null,['placeholder'=>'Youtube Video Link','class'=>'form-control']) !!}
									</div>
									<div class="form-group">
										{!! Form::submit('Submit',['class'=>'btn btn-primary','name'=>"submit"]) !!}
									</div>
									{!!Form::close()!!}
									@endif
									@foreach($videos as $video)
									<iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$video->url}}"></iframe>
									@endforeach
								</div>
				</div>
				<div class="tabs-profile">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#work1">Work Experience</a></li>

						<li><a data-toggle="tab" href="#details2">Details</a></li>

					</ul>

					<div class="tab-content">
						<div id="work1" class="tab-pane fade in active">
							<p>Last Job : <b>{{$user->lastJob}}</b></p>
							<p>Last Job Details : <b>{{$user->lastJobDetails}}</b></p>
							<p>Company : <b>{{$user->company}}</b></p>
						</div>

						<div id="details2" class="tab-pane fade">
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
						</div>


					</div>
					<div>
					</div>
				</div>
				<hr>
			<!--<div class="images">
				@if($owner)
				{!! Form::open(array('url'=>'folio/'.$user->username,'method'=>'POST', 'files'=>true)) !!}
				<div class="form-group">
					{!! Form::file('images[]', array('multiple'=>true)) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Upload',['class'=>'btn btn-primary','name'=>"submit"]) !!}
				</div>
				{!!Form::close()!!}
				@endif
				@foreach($images as $image)
				<img src="{{$image->url}}" class="folioImage">
				@endforeach
				<div class="river">
					<img src="" class="waterImage">
				</div>
			</div>
			<div class="videos">
				@if($owner)
				{!! Form::open(array('url'=>'folio/video/'.$user->username,'method'=>'POST')) !!}
				<div class="form-group">
					{!! Form::label('Youtube Video Link') !!}
					{!! Form::text('url',null,['placeholder'=>'Youtube Video Link','class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Submit',['class'=>'btn btn-primary','name'=>"submit"]) !!}
				</div>
				{!!Form::close()!!}
				@endif
				@foreach($videos as $video)
				<iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$video->url}}"></iframe>
				@endforeach
			</div>-->
		</div>

	</div></div>
</div>

@stop