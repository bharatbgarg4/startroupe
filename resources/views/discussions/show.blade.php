@extends('layouts.page')

@section('pagecontent')

<h2>{{$discussion->title}}</h2>

<div class="all-content">
	{!! $discussion->content !!}
</div>

@if(Auth::check())
@if(Auth::user()->id == $discussion->user->id)
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Confirm Delete for Discussion</h4>
        <a href="/discussion/{{$discussion->slug}}/delete" class="btn btn-danger" class="btn btn-danger"><i class="fa fa-trash"></i> Confirm Delete</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
@endif
@endif
@include('partials.comment')
@stop