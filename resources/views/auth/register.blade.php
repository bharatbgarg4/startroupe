@extends('layouts.pageFluid')

@section('pagecontent')

<div id="auth">	
	<div class="banner"><img src="/images/hiring-banner.jpg" alt=""></div>
	<h1 class="tac"> START YOUR JOURNEY HERE! </h1>
	<div class="container signup">
		<div class="row">
			<div class="col col-sm-6">
				<div id="artist">
					<h4> Become an Artist </h4>	
					<a href="#" class="btn btn-success">SIGN UP NOW</a>	
				</div>
			</div>
			<div class="col col-sm-6">
				<div id="bussiness">
					<h4> Hire Artist </h4>	
					<a href="#" class="btn btn-success">SIGN UP NOW</a>	
				</div>
			</div>
		</div>

		<div class="regmodal">
			<form id="text-anime" method="POST" action="/register">
				<h1>SIGN UP</h1>
				<h3 id="regtxt">AS</h3>
				<span class="close"><i class="fa fa-times"></i></span>
				{!! csrf_field() !!}
				<input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name">
				<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
				<input type="hidden" name="type" value="0" id="typeHolder">
				<input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="Username">
				<input type="password" name="password" class="form-control" placeholder="Password">
				<div class="ci">
					{!! Form::radio('artist', '0',true) !!}
					Sign up as Individual
					<br>
					{!! Form::radio('artist', '1') !!}
					Sign up as Group
				</div>
				<script src='https://www.google.com/recaptcha/api.js'></script>
				<div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
				<button type="submit" class="btn btn-success">SUBMIT</button>
			</form>
		</div>
	</div>
</div>
@stop