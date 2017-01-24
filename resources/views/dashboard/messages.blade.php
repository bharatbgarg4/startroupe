@extends('layouts.dashboard')

@section('dashboardcontent')

@foreach($messages as $message)
<p>{{$message->name}}</p>
<h4>{{$message->email}}</h4>
<p>{{$message->mobile}}</p>
<p>{{$message->message}}</p>

<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$message->id}}"><i class="fa fa-trash"></i></button>
<div id="delete-{{$message->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Confirm Delete for Message</h4>
        <a href="/dashboard/message/{{$message->id}}/delete" class="btn btn-danger">Delete</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

@endforeach

@stop