@extends('layouts.page')

@section('pagecontent')

<div class="row">

	<div class="col col-sm-8">

		<h5>Posted: {{$job->created_at->diffForHumans()}}</h5>

		<h2>{{$job->title}}</h2>

		<p>{{$job->talent->title}}, <i class="fa fa-map-marker"></i> {{$job->location->title}}</p>

		<div class="all-content">
			{!! $job->content !!}
		</div>
		<p><b>Budget:</b>  <i class="fa fa-inr"></i> {{$job->budget}}</p>
		<hr>
		@if(Auth::check())
		@if(Auth::user()->id==$job->user_id or Auth::user()->admin)
		<div class="offers">
			@foreach($job->offers as $offer)
			<div class="row inner">
				<div class="col col-sm-4">

				<img src="{{$offer->user->imgUrl}}" class="sim">
				</div>
				<div class="col col-sm-8">
				<h4>{{$offer->user->name}}</h4>
				<p>{{$offer->user->talent->title}}, <i class="fa fa-map-marker"></i> {{$offer->user->location->title}}</p>
				<p>{{$offer->content}}</p>
			</div>
			</div>
			<hr>
			@endforeach
		</div>
		@endif
		@if(!Auth::user()->editor or Auth::user()->admin)
		{!!Form::open(['url'=>'/apply/'.$job->id,'files' => true])!!}
		<div class="form-group">
			{!! Form::label('Comment') !!}
			{!! Form::textarea('content',null,['placeholder'=>'Comment','class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Apply for this Job',['class'=>'btn btn-success','name'=>"submit"]) !!}
		</div>
		{!! Form::close() !!}
		@endif
		@else
		<a href="/signin" class="btn btn-info">Sign In To Apply</a>
		@endif
	</div>
	<div class="col col-sm-4">
		<h3>Similar Jobs</h3>
		<div class="similar">
			@foreach($similar as $s)
			<div class="ea">
				<a href="/job/{{$s->id}}">
					<h3>{{$s->title}}</h3>
					<h5>Posted: {{$s->created_at->diffForHumans()}}</h5>
				</a>
			</div>
			<hr>
			@endforeach
		</div>
	</div>
</div>

@stop