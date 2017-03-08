<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="" />
	<meta name="description" content="Startroupe.com is a complete marketplace for finding and hiring best actors, dancers, photographers, singers, rj, vj, makeup artists, performers, comedians and much more."/>
	<link href="/logo.png" rel="icon" type="image/x-icon" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Talent Marketplace | Actors, singers, models, dancers, photographers.</title>
	<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	@yield('headinclude')
</head>
<body>
	<div class="coming-page">
		<div class="coming-inner">
			<img src="/images/logo.png">
			<h2>Coming soon...</h2>

			{!!Form::open(['url'=>'/coming'])!!}				
			<label>Sign up below for an exclusive invite </label>
			<p>
			{!! Form::text('name',null,['placeholder'=>'Your Name']) !!}
			{!! Form::text('email',null,['placeholder'=>'Your Email']) !!}
			{!! Form::submit('Go',['name'=>"submit"]) !!}
			</p>
			{!!Form::close()!!}
		</div>
	</div>
	@include('partials.notifications')
	<script src="{{ elixir('js/all.js') }}"></script>
	@yield('footinclude')
</body>
</html>