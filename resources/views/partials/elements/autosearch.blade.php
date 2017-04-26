{!!Form::open(['url'=>'/autosearch'])!!}

<div class="row">
	<div class="col col-sm-12 form-group">
		{!! Form::text('word',null,['placeholder'=>'Start Searching','class'=>'form-control autof']) !!}
	</div>
	<div class="auton"></div>
</div>
<div class="form-group">
	{!! Form::submit('Search Jobs',['class'=>'btn btn-primary','name'=>"type_jobs"]) !!}
	{!! Form::submit('Search Talent',['class'=>'btn btn-info','name'=>"type_talent"]) !!}
</div>
{!!Form::close()!!}