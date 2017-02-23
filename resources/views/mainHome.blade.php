@extends('app')

@section('appcontent')
<div id="fold">
	@include('partials.elements.navhome')
	@yield('maincontent')
</div>
@include('partials.notifications')
@include('partials.elements.footer')
<script src="{{ elixir('js/all.js') }}"></script>
@yield('footinclude')
@stop