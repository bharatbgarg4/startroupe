@extends('layouts.dashboard')

@section('dashboardcontent')
<div class="bus">
	<h1>LATEST ARTIST</h1>

		<div class="owl-carousel owl-theme">


		@foreach($latest as $user)
		<div class="item">

				@include('partials.elements.userBox')

		</div>
		@endforeach
	</div>
</div>

<div class="bus">
	<h1>TOP RATED ARTIST</h1>
	<div class="owl-carousel owl-carousel1 owl-theme">
		@foreach($rating as $user)

			<div class="item">
				@include('partials.elements.userBox')
			</div>

		@endforeach</div>
	</div>


<div class="bus">
	<h1>RECENTLY VIEWED ARTISTS</h1>
	<div class="owl-carousel owl-carouse2 owl-theme">
		@foreach($viewed as $user)
		<div class="item">

				@include('partials.elements.userBox')
			</div>

		@endforeach
	</div></div>


<div class="bus">
	<h1>FAVOURITE CATEGORY ARTISTS</h1>
	<div class="owl-carousel owl-carousel3 owl-theme">
		@foreach($fav as $user)
		<div class="item">

				@include('partials.elements.userBox')
			</div>

		@endforeach</div>

</div>
@stop

