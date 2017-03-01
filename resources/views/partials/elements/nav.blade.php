<div id="nav" class="home-nav nav-page ">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="logo">
					<a class="brand" href="/"><img class="img-responsive" src="/images/logo.png"></a>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="col-sm-12 navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>




				<nav class="navbar navigation">
					<div class="collapse navbar-collapse" id="navbar-collapse-1">
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
					</ul></div>
				</nav>
			</div>
		</div>
	</div>
</div>