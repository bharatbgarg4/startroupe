@extends('layouts.page')

@section('pagecontent')
<div class="profile">
	<div class="row">
		<div class="col col-sm-4">
			<div class="topi">
				<div class="lefti">
					<img src="{{$user->imgUrl}}" class="profileImage">
				</div>
				<div class="righti">
					@if($user->talent)
					<p><b> {{$user->talent->title}}</b></p>
					@endif
					@if($user->location)
					<p><b> <i class="fa fa-map-marker"></i> {{$user->location->title}}</b></p>
					@endif

				</div>
			</div>
			<h4>{{$user->name}}</h4>
			<p><i class="fa fa-eye"></i> Profile Views : {{$user->views}}</p>
			@if($liked)
			<p> <a href="/profile/{{$user->username}}/unlike"> <i class="fa fa-thumbs-o-up"></i> Likes : {{$user->likes}}</a> <i class="fa fa-check" style="color:green;float:right"></i></p>
			@else
			<p> <a href="/profile/{{$user->username}}/like"> <i class="fa fa-thumbs-up"></i> Likes : {{$user->likes}}</p></a>
			@endif
			<h4>About</h4>
			<p><i>{{$user->bio}}</i></p>
			<hr>
			<h4>Social Links</h4>
			@if($user->facebook)
			<span class="lin"><a href="{{$user->facebook}}"><i class="fa fa-facebook"></i></a></span>
			@endif
			@if($user->twitter)
			<span class="lin"><a href="{{$user->twitter}}"><i class="fa fa-twitter"></i></a></span>
			@endif
			@if($user->linkedin)
			<span class="lin"><a href="{{$user->linkedin}}"><i class="fa fa-linkedin"></i></a></span>
			@endif
			@if($user->youtube)
			<span class="lin"><a href="{{$user->youtube}}"><i class="fa fa-youtube"></i></a></span>
			@endif
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
		</div>
		<div class="col col-sm-7 portfolio">
			<h2>Portfolio</h2>
			<div>
				<a href="#" class="btn btn-primary btn-images">Images</a>
				<a href="#" class="btn btn-info btn-videos">Videos</a>
			</div>
			<hr>
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
	</div>
</div>

@stop