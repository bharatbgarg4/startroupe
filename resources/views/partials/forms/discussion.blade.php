<div class="form-group">
{!! Form::label('Title') !!}
{!! Form::text('title',null,['placeholder'=>'Title','class'=>'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('Content') !!}
{!! Form::textarea('content',null,['placeholder'=>'Enter the content','class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
</div>

{!!Form::close()!!}
