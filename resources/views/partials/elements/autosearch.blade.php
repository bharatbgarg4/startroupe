{!!Form::open(['url'=>'/autosearch'])!!}

<div class="row">
	<div class="col col-sm-12 form-group">
		{!! Form::text('word',null,['placeholder'=>'Start Searching','class'=>'form-control autof']) !!}
	</div>
	<div class="auton"></div>
</div>
<div class="form-group">
	{!! Form::submit('Get Jobs',['class'=>'btn btn-primary','name'=>"type_jobs"]) !!}
	{!! Form::submit('Get Talent',['class'=>'btn btn-info','name'=>"type_talent"]) !!}
</div>
{!!Form::close()!!}