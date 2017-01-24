@extends('layouts.dashboard')

@section('dashboardcontent')

<h3>Create Article</h3>
{!!Form::open(['url'=>'article','files'=>true])!!}

@include('partials.forms.article')

@stop