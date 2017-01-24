@extends('layouts.dashboard')

@section('dashboardcontent')

<h3>Create Discussion</h3>
{!!Form::open(['url'=>'discussion'])!!}

@include('partials.forms.discussion')

@stop