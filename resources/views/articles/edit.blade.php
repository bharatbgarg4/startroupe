@extends('layouts.page')

@section('pagecontent')

<h1>Edit the Article</h1>

{!!Form::model($article,['url'=>'article/'.$article->slug,'method'=>'patch','files' => true])!!}

@include('partials.forms.article')

@stop