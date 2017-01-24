@extends('layouts.page')

@section('pagecontent')


@foreach($discussions as $discussion)
<a href="/discussion/{{$discussion->slug}}"><h1>{{$discussion->title}}</h1></a>
@endforeach

@stop