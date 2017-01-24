@if(Auth::user())
@if(Auth::user()->admin)

<div><a href="#" data-toggle="modal" data-target="#catModal"> <i class="fa fa-plus"></i> Category </a></div>
<div id="catModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Talent Category</h4>
			</div>
			<div class="modal-body">
				{!!Form::open(['url'=>'/talent/save'])!!}
				<div class="form-group">
				{!! Form::label('Title') !!}
				{!! Form::text('title',null,['placeholder'=>'Title','class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Submit',['class'=>'btn btn-primary','name'=>"submit"]) !!}
				</div>

				{!!Form::close()!!}
			</div>
		</div>

	</div>
</div>

<div><a href="#" data-toggle="modal" data-target="#locationModal"> <i class="fa fa-plus"></i> Location </a></div>
<div id="locationModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Location</h4>
			</div>
			<div class="modal-body">
				{!!Form::open(['url'=>'/location/save'])!!}
				<div class="form-group">
				{!! Form::label('Title') !!}
				{!! Form::text('title',null,['placeholder'=>'Title','class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Submit',['class'=>'btn btn-primary','name'=>"submit"]) !!}
				</div>

				{!!Form::close()!!}
			</div>
		</div>

	</div>
</div>	
@endif
@endif