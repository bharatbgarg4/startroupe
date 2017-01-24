<div class="jobBox">
	<a href="/job/{{$job->id}}">
		<span>			
			<h3 class="title">{{$job->title}}</h3>
			<h5>Posted By: <i>{{$job->user->name}}</i></h5>
			@if($job->talent)
			<h4> {{$job->talent->title}} </h4>
			@else
			<h4> Talent </h4>
			@endif
			@if($job->location)
			<h4> {{$job->location->title}} </h4>
			@else
			<h4> Location </h4>
			@endif
			<div> {!! $job->content !!} </div>
		</span>
	</a>
</div>