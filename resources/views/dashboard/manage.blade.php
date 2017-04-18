@extends('layouts.dashboard')

@section('dashboardcontent')
@include('partials.elements.talentModals')

<h4>Talent</h4>
@foreach($talents as $talent)
<div>
	{{$talent->title}} <a href="/talent/delete/{{$talent->slug}}"><i class="fa fa-trash"></i></a>
</div>
@endforeach

<hr>
<h4>Locations</h4>
@foreach($locations as $location)
<div>
	{{$location->title}} <a href="/location/delete/{{$location->slug}}"><i class="fa fa-trash"></i></a>
</div>
@endforeach

@stop