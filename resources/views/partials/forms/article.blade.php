@section('headinclude')
@include('partials.forms.tinymce')
@stop

<div class="row">
<div class="form-group col col-md-6">
{!! Form::label('Title') !!}
{!! Form::text('title',null,['placeholder'=>'Title','class'=>'form-control']) !!}
</div>
<div class="form-group col col-md-6">
{!! Form::label('Slug') !!}
{!! Form::text('slug',null,['placeholder'=>'Slug','class'=>'form-control']) !!}
</div>
</div>

<div class="form-group">
{!! Form::label('Content') !!}
{!! Form::textarea('content',null,['placeholder'=>'Enter the content','class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Submit',['class'=>'btn btn-primary','name'=>"submit"]) !!}
</div>

{!!Form::close()!!}
