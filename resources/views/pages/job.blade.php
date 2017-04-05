@extends('layouts.page')

@section('pagecontent')
<div class="col col-sm-12 single-job">
<div class="row">
	<div class="col col-sm-8">
	<div class="jobBox">


			<div class="job-head">
				<a href="/job/{{$job->id}}">
					<h3 class="title">{{$job->title}}</h3>
				</a>
				@if($job->talent)
				<h4 class="{{$job->talent->title}}"> {{$job->talent->title}} </h4>
				@else
				<h4> Talent </h4>
				@endif
			</div>
				<div class="job-span">
					<span>Posted By:
						<b><a href="/profile/{{$job->user->username}}"><img src="{{$job->user->imgUrl}}" style="width: 40px;">{{$job->user->name}}</a></b></span>
					<span>Posted:
					<b>{{$job->created_at->diffForHumans()}}</b>
					</span>

				@if($job->location)
				 <span><i class="fa fa-map-marker"></i>
				 	{{$job->location->title}}
				 	 </span>
				@else
				<span> Location </span>
				@endif
				<span>Budget:<b><i class="fa fa-inr"></i> {{$job->budget}}</b></span>

			</div>
			<p>
				{!! $job->content !!}
			</p>

			@if(Auth::check())
			@if(!Auth::user()->editor or Auth::user()->admin)
			{!!Form::open(['url'=>'/apply/'.$job->id,'files' => true])!!}
			<div class="form-group">
				{!! Form::label('Comment') !!}
				{!! Form::textarea('content',null,['placeholder'=>'Do you have any questions?','class'=>'form-control']) !!}
			</div>
			<div class="form-group">
			<p><i>Your contact details will be sent.</i></p>
				{!! Form::submit('Apply for this Job',['class'=>'btn btn-success','name'=>"submit"]) !!}
			</div>
			{!! Form::close() !!}
			@else
			<a href="/signin" class="btn btn-info">Sign In To Apply</a>
			@endif

			@if(Auth::user()->id==$job->user_id or Auth::user()->admin)
			<h3>Artists Applications</h3>
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
			@endif
		</div>
	</div>
	<div class="col col-sm-4 sidebar">
		<h3>Similar Jobs</h3>
		<div class="similar">
			@foreach($similar as $s)
			<div class="ea">
				<a href="/job/{{$s->id}}">
					<h3>{{$s->title}}</h3>
					<h5>Posted: {{$s->created_at->diffForHumans()}}</h5>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</div></div>

@stop