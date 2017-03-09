<div class="jobBox">
	<div class="col col-sm-9">

	<div class="job-head">

			<a href="/job/{{$job->id}}">
				<h3 class="title">{{$job->title}}</h3>
				@if($job->talent)
			<h4 class="{{$job->talent->title}}"> {{$job->talent->title}} </h4>
			@else
			<h4> Talent </h4>
			@endif
			</a>

		</div>
		<div class="job-span">
			<span>Posted By:
				<b>{{$job->user->name}}</b></span>
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
			</div>
			<p> {!! $job->content !!} </p>
		</div>
		<div class="col col-sm-3 job-rght">

			<img src="/images/logo.png">
			<ul>
									<li>

											<img src="/images/star.png">
											<i></i>

									</li>
									<li>

											<img src="/images/star.png"><i></i>

									</li>
									<li>

											<img src="/images/star.png"><i></i>

									</li>
									<li class="no-star">

											<img src="/images/star.png"><i></i>

									</li>
									<li class="no-star">

											<img src="/images/star.png"><i></i>

									</li>



								</ul>

		</div>
	</div>