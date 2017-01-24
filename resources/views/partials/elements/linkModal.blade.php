@if(Auth::user())
@if(Auth::user()->admin)

<div><b><a href="#" data-toggle="modal" data-target="#seoLinkModal"> <i class="fa fa-plus"></i> Seo Link </a></b></div>
<div id="seoLinkModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Seo Link</h4>
			</div>
			<div class="modal-body">
				{!!Form::open(['url'=>'/seolink/save'])!!}
				<div class="form-group">
				{!! Form::label('Title') !!}
				{!! Form::text('title',null,['placeholder'=>'Title','class'=>'form-control']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('Talent') !!}
				{!! Form::select('talent_id',$select_talent,null , ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('Location') !!}
				{!! Form::select('location_id',$select_location,null , ['class'=>'form-control']) !!}
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