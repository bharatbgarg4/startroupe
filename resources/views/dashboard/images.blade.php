@extends('layouts.dashboard')

@section('dashboardcontent')

<h1>Images</h1>

<a href="#" data-toggle="modal" data-target="#ImageModal" class="btn btn-primary">Add a Image</a><p></p>
@include('partials.elements.imageModal')

@if(!$images->isEmpty())
<table class="table table-hover">
		<tr>
			<th>Title</th>
			<th>Image</th>
			<th>Url</th>
			<th>Action</th>			
		</tr>
	@foreach($images as $image)
	
		<tr>
			<td>{{$image->title}}</td>
			<td><img src="{{$image->url}}" class="editorImage"></td>			
			<td>{{$image->url}}</td>			
			<td>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$image->id}}"><i class="fa fa-trash"></i></button>
				<div id="delete-{{$image->id}}" class="modal fade" role="dialog">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-body">
				        <h4>Confirm Delete for Image {{$image->title}}</h4>
				        <a href="/admin/images/{{$image->id}}/delete" class="btn btn-danger">Delete</a>
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				      </div>
				    </div>
				  </div>
				</div>
			</td>			
		</tr>
	@endforeach
	</table>

@else
<h5>No image added.</h5>
@endif
@stop