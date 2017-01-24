<div class="comments">
	<h3>Comments</h3>
	<div class="row">
	@foreach($comments as $comment)
	<div class="col col-md-4">
		<div>
			<img src="{{$comment->user->imgUrl}}" class="img-rounded" width="50px" height="50px">
			<p>{{$comment->user->name}}</p>
		</div>
		<div>
			{{$comment->content}}
			@if(Auth::check())
			@if((Auth::user()->is_admin) or ((Auth::user()->id) == ($comment->user->id)))
			<a href="/{{$elementname}}/{{$element->slug}}/comment/{{$comment->id}}/delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
			@endif
			@endif
		</div>
	</div>
	@endforeach
</div>
</div>

<div>
	@if(Auth::check())
	{!!Form::open(['url'=>$elementname.'/'.$element->slug.'/comment'])!!}
	<div class="form-group">
	{!! Form::textarea('content',null,['placeholder'=>'Enter Your Comment','class'=>'form-control','rows'=>'4']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Submit',['class'=>'btn btn-primary','name'=>"submit"]) !!}
	</div>
	{!!Form::close()!!}
	@else
	<a href="/login" class="btn btn-success">Login To Comment</a>
	@endif
</div>