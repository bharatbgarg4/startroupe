@extends('layouts.page')

@section('pagecontent')


@foreach($articles as $article)
<a href="/article/{{$article->slug}}"><h1>{{$article->title}}</h1></a>
@endforeach

@stop