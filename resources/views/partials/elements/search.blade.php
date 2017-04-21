{!!Form::open(['url'=>'/search'])!!}

<div class="row">
	<div class="col col-sm-12 form-group">
		{!! Form::select('talent',$select_talent,null , ['class'=>'form-control']) !!}
	</div>

	<div class="col col-sm-12 form-group">
		{!! Form::select('location',$select_location,null , ['class'=>'form-control']) !!}
	</div> 
</div>
<div class="form-group">
	{!! Form::submit('Get Jobs',['class'=>'btn btn-primary','name'=>"type_jobs"]) !!}
	{!! Form::submit('Get Talent',['class'=>'btn btn-info','name'=>"type_talent"]) !!}
</div>
{!!Form::close()!!}