@extends('layouts.dashboard')

@section('dashboardcontent')
<div class="bus">
	<h1>LATEST ARTIST</h1>
	<div class="row">
		<div class="owl-carousel owl-theme">


		@foreach($latest as $user)
		<div class="item">

				@include('partials.elements.userBox')

		</div>
		@endforeach
	</div></div>
</div>

<div class="bus">
	<h1>TOP RATED ARTIST</h1>
	<div class="row">
		@foreach($rating as $user)
		<div class="col col-sm-3">
			<div class="inner">
				@include('partials.elements.userBox')
			</div>
		</div>
		@endforeach
	</div>
</div>

<div class="bus">
	<h1>RECENTLY VIEWED ARTISTS</h1>
	<div class="row">
		@foreach($viewed as $user)
		<div class="col col-sm-3">
			<div class="inner">
				@include('partials.elements.userBox')
			</div>
		</div>
		@endforeach
	</div>
</div>

<div class="bus">
	<h1>FAVOURITE CATEGORY ARTISTS</h1>
	<div class="row">
		@foreach($fav as $user)
		<div class="col col-sm-3">
			<div class="inner">
				@include('partials.elements.userBox')
			</div>
		</div>
		@endforeach
	</div>
</div>
@stop

