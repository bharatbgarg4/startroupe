@extends('layouts.page')

@section('pagecontent')
<div id="listing">
	<div class="row categories">
		<div class="col col-sm-3 lside">

			@include('partials.elements.talentModals')
			{!!Form::open(['url'=>'/search'])!!}
			<div class="form-group">
			{!! Form::label('Category') !!}
				<input type="text" name="" value="" class="form-control" placeholder="Search actors, singers, other talent..">
				<!--{!! Form::label('Category') !!}
				@if($talent)
				{!! Form::select('talent',$select_talent,$talent->slug , ['class'=>'form-control']) !!}
				@else
				{!! Form::select('talent',$select_talent,null , ['class'=>'form-control']) !!}
				@endif-->
			</div>

			<div class="form-group">
				{!! Form::label('Location') !!}
				@if($location)
				{!! Form::select('location',$select_location,$location->slug , ['class'=>'form-control']) !!}
				@else
				{!! Form::select('location',$select_location,null , ['class'=>'form-control']) !!}
				@endif
			</div>
			<div class="form-group">
				{!! Form::submit('Filter',['class'=>'btn btn-success','name'=>"type_".$type]) !!}<a href="/{{$type}}" class="head">Remove Filter</a>
			</div>
			{!!Form::close()!!}
			<div class="topper">


				<div class="col search">
					<form action="/search/{{$type}}" method="get" class="form-inline">
						<div class="form-group">

								<input class="form-control" type="query" id="query" name="query" placeholder="Search"><button type="submit" class="ing"><i class="fa fa-search"></i></button>

						</div>

					</form>
				</div>
				<div class="col labels">
					@if($users)
					<span class="label label-success">Talent</span>
					@else
					<span class="label label-success">Jobs</span>
					@endif
					@if($talent)
					<span class="label label-info">{{$talent->title}}</span>
					@endif
					@if($location)
					<span class="label label-warning">{{$location->title}}</span>
					@endif
					@if(isset($query))
					<span class="label label-danger"> Search : {{$query}}</span>
					@endif
				</div>

		</div>
		</div>
		<div class="col col-sm-9">

		<div class="col col-sm-12 listing">
			@if($users)
			@if($users->isEmpty())
			<h4>No Users in this Category</h4>
			@else
			@foreach($users as $user)
			<div class="col-sm-6 col-md-4">
				<div class="inner">
					@include('partials.elements.userBox')
				</div>
			</div>
			@endforeach
			@endif
			@endif

			@if($jobs)
			@if($jobs->isEmpty())
			<h4>No Jobs in this Category</h4>
			@else
			@foreach($jobs as $job)
			@include('partials.elements.jobBox')
			@endforeach
			@endif
			@endif
		</div>
	</div>
	</div>
</div>
@stop