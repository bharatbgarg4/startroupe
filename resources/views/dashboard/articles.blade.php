@extends('layouts.dashboard')

@section('dashboardcontent')

@foreach($articles as $article)
<a href="/article/{{$article->slug}}"><h1>{{$article->title}}</h1></a>
@endforeach

@stop