@extends('layouts.pageFluid')

@section('pagecontent')
<div id="home">
	<section class="banner">
		<div class="container">
			<h1 class="tac"> Find Best of Local Artists </h1>
			<div class="search">
				{!!Form::open(['url'=>'/search'])!!}

				<div class="row">
					<div class="col col-sm-6 form-group">
						{!! Form::label('Talent') !!}
						{!! Form::select('talent',$select_talent,null , ['class'=>'form-control']) !!}
					</div>

					<div class="col col-sm-6 form-group">
						{!! Form::label('Location') !!}
						{!! Form::select('location',$select_location,null , ['class'=>'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::submit('Get Jobs',['class'=>'btn btn-primary','name'=>"type_jobs"]) !!}
					{!! Form::submit('Get Talent',['class'=>'btn btn-info','name'=>"type_talent"]) !!}
				</div>

				{!!Form::close()!!}
			</div>
		</div>
	</section>
	<section class="profile">
		<div class="container">
			<div class="list">
				@foreach($talents as $talent)
				<span><a href="/talent/{{$talent->slug}}"> {{$talent->title}} </a></span>
				@endforeach
				<span><a href="/talent" class="seeall"> See All </a></span>
			</div>
			<div class="row categories">
				@if($users->isEmpty())
				<h4>No Users in this Category</h4>
				@else
				@foreach($users as $user)
				<div class="col-sm-6 col-md-3">
					<div class="inner">
						@include('partials.elements.userBox')
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</section>
	<section class="works">
		<div class="container">
			<h2 class="tac"> How it Works </h2>
			<div class="row">
				<div class="col col-sm-6">
					<div class="side1">
						<img src="/images/how-works.png ">
					</div>
				</div>
				<div class="col col-sm-6 side2">
					<div class="row inner">
						<div class="col col-sm-3 icon">
							<img src="/images/search-person.png">
						</div>
						<div class="col col-sm-9 con">
							Search your desired artist by name or category
						</div>
					</div>
					<div class="row inner">
						<div class="col col-sm-3 icon">
							<img src="/images/hire.png">
						</div>
						<div class="col col-sm-9 con">
							Hire best talent or apply to artist job postings
						</div>
					</div>
					<div class="row inner">
						<div class="col col-sm-3 icon">
							<img src="/images/reviews.png">
						</div>
						<div class="col col-sm-9 con">
							Leave reviews about your working experience
						</div>
					</div>
					<div class="row">
						<div class="col col-sm-3"></div>
						<div class="col col-sm-9 con">
							<a href="/signup" class="btn btn-success">Sign Up </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="top-talent">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="tac"> Browse Top Talents </h2>
				</div>
			</div>
			<div class="row">
				@include('partials.elements.linkModal')
				@foreach($links as $link)
				<div class="col-sm-4">
					<span class="seo-link"><a href="/talent/{{$link->talent->slug}}/{{$link->location->slug}}">{{$link->title}}</a></span>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<section class="companies">
		<div class="container">
			<h2 class="tac"> Companies hiring through Startroupe </h2>
			<div class="imal">
				<span class="imah"><img src="/images/company-1.png"> </span>
				<span class="imah"><img src="/images/company-2.png"> </span>
				<span class="imah"><img src="/images/company-3.png"> </span>
				<span class="imah"><img src="/images/company-4.png"> </span>
				<span class="imah"><img src="/images/company-5.png"> </span>
			</div>
		</div>
	</section>
	<section class="reviewed">
		<div class="container">
			<h2 class="tac"> Recently Reviewed Artists </h2>
			<div class="row">
				<div class="col col-sm-6">
					<div class="row">

						<div class="col col-sm-4 artist">
							<img src="/images/artist-1.png">
						</div>
						<div class="col col-sm-8 content">
							<p> “Parvesh is an awesome artist and is very professional. I’m glad to have worked with him and will do the same in future.”</p>
							<p class="tar"><strong> -Bunty Bains </strong></p>
						</div>
					</div>
				</div>
				<div class="col col-sm-6">
					<div class="row">

						<div class="col col-sm-4 artist">
							<img src="/images/artist-2.png">
						</div>
						<div class="col col-sm-8 content">
							<p> “Amanda and her troupe are great singers and perfomers. The show went very well and I’m signing them for next project.”</p>
							<p class="tar"><strong> -Bunty Bains </strong></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="invitation">
		<h4 class="inn"> <strong> Invite Your Band, Team, Troupe Onboard </strong> </h4>
		<a href="/signup" class="started"> Get Started </a>
	</section>
</div>
@stop