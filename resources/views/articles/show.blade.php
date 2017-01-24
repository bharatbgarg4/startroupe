@extends('layouts.page')

@section('pagecontent')

<h2>{{$article->title}}</h2>

<div class="all-content">
	{!! $article->content !!}
</div>

@if(Auth::check())
@if(Auth::user()->editor)

<a href="/article/{{$article->slug}}/edit" class="btn btn-warning">Edit Article</a>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$article->slug}}"><i class="fa fa-trash"></i></button>
<div id="delete-{{$article->slug}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Confirm Delete for Article {{$article->title}}</h4>
        <a href="/article/{{$article->slug}}/delete" class="btn btn-danger"><i class="fa fa-trash"></i> Confirm Delete</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

@endif
@endif
@include('partials.comment')
@stop