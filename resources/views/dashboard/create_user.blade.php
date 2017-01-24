@extends('layouts.dashboard')

@section('dashboardcontent')


			{!!Form::open(['url'=>'dashboard/user','files' => true])!!}
			<div class="form-group">
				{!! Form::label('name') !!}
			{!! Form::text('name',null,['placeholder'=>'Name','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('username') !!}
			{!! Form::text('username',null,['placeholder'=>'Username','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('email') !!}
			{!! Form::email('email',null,['placeholder'=>'Name','class'=>'form-control']) !!}
			</div>

			<div class="form-group">
			    {!! Form::label('Image') !!}
			    {!! Form::file('imgUrl', null,['class'=>'btn btn-primary']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('Password') !!}
			{!! Form::password('password',['placeholder'=>'New Password','class'=>'form-control']) !!}
			</div>

		    <div class="form-group">
		        <button type="submit" class="btn btn-primary form-control">Update</button>
		    </div>
			{!! Form::close() !!}
			<a href="#" class="btn btn-warning pull-right canceledit">Cancel</a>
		</div>

	</div>
</div>
@stop