@extends('layouts.dashboard')

@section('dashboardcontent')

@foreach($discussions as $discussion)
<a href="/discussion/{{$discussion->slug}}"><h1>{{$discussion->title}}</h1></a>
@endforeach

@stop