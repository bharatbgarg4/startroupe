@extends('layouts.pageFluid')

@section('pagecontent')
<div id="auth">	
	<div class="banner"><img src="/images/signin-banner.jpg" alt=""></div>
	<h1 class="tac"> SIGN IN </h1>
<div class="signin">	
	<p> Sign In here to access your account </p>

	<a href="/login/facebook" class="btn btn-social btn-f"><i class="fa fa-facebook-f"></i>   Facebook</a>
	<a href="/login/google" class="btn btn-social btn-g"> <i class="fa fa-google"></i> Google</a>

	<form method="POST" action="/login">
		{!! csrf_field() !!}
		<div class="form-group">
			<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
		</div>
		<div class="form-group">
			<input type="password" name="password" id="password" class="form-control" placeholder="Password">
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-success form-control">SUBMIT</button>
			<a href="/password/email" >Reset Password</a>
		</div>
	</form>
</div>
</div>

@stop
