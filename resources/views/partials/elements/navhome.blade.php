<div id="nav" class="homenav">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="logo">
					<a class="brand" href="/"><img class="img-responsive" src="/images/logo.png"></a>
				</div>
			</div>
			<div class="col-sm-8">
				<nav class="navbar navigation">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/talent"> Talent </a></li>
						<li><a href="/jobs"> Jobs </a></li>
						@if(Auth::check())
						<li><a href="/dashboard">{{Auth::user()->name}}</a></li>
						<li><a href="/signout">Sign Out</a></li>
						@else
						<li><a href="/signin">Sign In</a></li>
						<li class="signup"><a href="/signup"> Sign Up </a></li>
						@endif
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>