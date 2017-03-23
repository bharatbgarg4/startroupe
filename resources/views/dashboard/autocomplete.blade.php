@extends('layouts.dashboard')

@section('dashboardcontent')

<a href="/dashboard/autoreset" class="btn btn-info">Reset</a>
<div class="row">
	<div class="col col-sm-6">
		<h3>Words</h3>
		<table class="table">
			<thead>
				<tr>
					<td>Word</td>
					<td>Count</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				@foreach($words as $word)
				<tr>
					<td>{{$word->word}}</td>
					<td>{{$word->count}}</td>
					<td><a href="/dashboard/word/reject/{{$word->id}}" class="btn btn-danger"><i class="fa fa-ban"></i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="col col-sm-6">
		<h3>Rejected Words</h3>
		<table class="table">
			<thead>
				<tr>
					<td>Word</td>
					<td>Count</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				@foreach($reject as $word)
				<tr>
					<td>{{$word->word}}</td>
					<td>{{$word->count}}</td>
					<td><a href="/dashboard/word/restore/{{$word->id}}" class="btn btn-danger"><i class="fa fa-check"></i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop