@extends('layouts.dashboard')

@section('headinclude')
@include('partials.forms.tinymce')
@stop

@section('dashboardcontent')
<button type="button" class="btn btn-info btn-lg  createjobbtn" data-toggle="modal" data-target="#jobModal">Create Job</button>

<div id="jobModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Create Job</h4>
			</div>
			<div class="modal-body">
				<div class="createjob">
					{!!Form::open(['url'=>'job/save'])!!}

					<div class="form-group">
						{!! Form::label('Title') !!}
						{!! Form::text('title',null,['placeholder'=>'Title','class'=>'form-control']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('Content') !!}
						{!! Form::textarea('content',null,['placeholder'=>'Enter the content','class'=>'form-control']) !!}
					</div>

					<div class="row">
						<div class="form-group col col-md-6">
							{!! Form::label('Talent') !!}
							{!! Form::select('talent_id',$select_talent,null , ['class'=>'form-control']) !!}
						</div>
						<div class="form-group col col-md-6">
							{!! Form::label('Location') !!}
							{!! Form::select('location_id',$select_location,null , ['class'=>'form-control']) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::submit('Submit',['class'=>'btn btn-primary','name'=>"submit"]) !!}
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>

					{!!Form::close()!!}

				</div>
			</div>
		</div>

	</div>
</div>

@foreach($jobs as $job)
<div class="col col-md-12 jobBoxprivate">
	<div class="job-head">
		<a href="/job/{{$job->id}}">
			<h3 class="title"> {{$job->title}}</h3>
		</a>
		<p><span>Posted: {{$job->created_at->diffForHumans()}}</span>
			<span><span>Applications: {{$job->offers()->count()}}</span>
		</p>
	</div>

</div>

@endforeach

@stop