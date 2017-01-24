@extends('layouts.dashboard')

@section('dashboardcontent')

<div id="offers">
	@foreach($offers as $offer)
	<div class="inner">
		<h5><a href="/job/{{$offer->job->id}}">{{$offer->job->title}}</a></h5>
		<div>
			{{$offer->content}}
		</div>
	</div>
	<hr>
	@endforeach
</div>

@stop