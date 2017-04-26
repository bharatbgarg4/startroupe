@extends('mainHome')

@section('maincontent')

<div id="home">
	<section class="banner">
		<div class="container">
			<div class="home-search">
				<h1 class="tac"> Find Best of Local Artists </h1>
				@include('partials.elements.autosearch')
			</div>
		</div>
	</section>
	<section class="profile">
		<div class="container">
			<div class="list">
				<span><a href="/talent" class="seeall"> All </a></span>
				@foreach($talents as $talent)
				<span><a href="/talent/{{$talent->slug}}"> {{$talent->title}} </a></span>
				@endforeach
			</div>
			<div class="row categories">
				@if($users->isEmpty())
				<h4>No Users in this Category</h4>
				@else
				@foreach($users as $user)
				<div class="col-md-3">
					<div class="inner">
						@include('partials.elements.userBox')
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</section>
	<section class="works">
		<div class="container">
			<h2 class="tac"> How it Works </h2>
			<div class="row">

				<div class="col col-sm-6 side2">
					<div class="row inner">
						<div class="col col-sm-2 icon">
							<img src="/images/search-person.png">
						</div>
						<div class="col col-sm-10 con">
							Search your desired artist by name or category
						</div>
					</div>
					<div class="row inner">
						<div class="col col-sm-2 icon">
							<img src="/images/hire.png">
						</div>
						<div class="col col-sm-10 con">
							Hire best talent or apply to artist job postings
						</div>
					</div>
					<div class="row inner">
						<div class="col col-sm-2 icon">
							<img src="/images/reviews.png">
						</div>
						<div class="col col-sm-10 con">
							Leave reviews about your working experience
						</div>
					</div>
					<div class="row">
						<div class="col col-sm-3"></div>
						<div class="col col-sm-9 con">
							<!--<a href="/signup" class="btn btn-success">Sign Up </a>-->
						</div>
					</div>
				</div>
				<div class="col col-sm-6">
					<div class="side1">
						<img src="/images/how-works.png ">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="top-talent">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="tac"> Browse Top Talents </h2>
				</div>
			</div>
			<div class="row">
				@include('partials.elements.linkModal')
				@foreach($links as $link)
				<div class="col-sm-3">
					<span class="seo-link"><a href="/talent/{{$link->talent->slug}}/{{$link->location->slug}}">{{$link->title}}</a></span>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<section class="companies">
		<div class="container">
			<!--<h2 class="tac"> Companies hiring through Startroupe </h2>-->
			<div class="imal">
				<span class="imah"><img src="/images/company-1.png"> </span>
				<span class="imah"><img src="/images/company-2.png"> </span>
				<span class="imah"><img src="/images/company-3.png"> </span>
				<span class="imah"><img src="/images/company-4.png"> </span>
				<span class="imah"><img src="/images/company-5.png"> </span>
			</div>
		</div>
	</section>
	<section class="reviewed">
		<div class="container">
			<h2 class="tac"> Recently Reviewed Artists </h2>
			<div class="row">
				<div class="col col-sm-6">
					<div class="testmonial-in">

						<div class="col col-sm-12 artist">
							<img src="/images/artist-1.png">
						</div>
						<div class="col col-sm-12 content">
							<p> “Parvesh is an awesome artist and is very professional. I’m glad to have worked with him and will do the same in future.”</p>
							<p class="tar"><strong> -Bunty Bains </strong></p>
						</div>
					</div>
				</div>
				<div class="col col-sm-6">
					<div class="testmonial-in">

						<div class="col col-sm-12 artist">
							<img src="/images/artist-2.png">
						</div>
						<div class="col col-sm-12 content">
							<p> “Amanda and her troupe are great singers and perfomers. The show went very well and I’m signing them for next project.”</p>
							<p class="tar"><strong> -Bunty Bains </strong></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="invitation">
		<div class="container"><h4 class="inn">  Invite Your <span>Band, Team, Troupe Onboard </span> </h4>
			<div id="fb-root"></div>
			<script src="http://connect.facebook.net/en_US/all.js"></script>
			<script>
			FB.init({ 
				appId:'1712754652385392', cookie:true, 
				status:true, xfbml:true 
			});
			function FacebookInviteFriends()
			{
				FB.ui({ method: 'apprequests', 
					message: 'VISIT THIS WEB SITE'});
			}
			</script>

			<a href='#' onClick="FacebookInviteFriends();" class="started"> Get Started </a>
		</div>
	</section>
</div>
@stop

@section('footinclude')
<script>
console.log('autocomplete');
var data=[];
String.prototype.beginsWith = function (string) {
	return(this.indexOf(string) === 0);
};
function popu(data,k=0){
	$( ".auton" ).empty();
	if(k){
		data=data.filter(function (el) {
			return el.word.beginsWith(k);
		});
	}
	if(data.length>0){
		data.sort(function(a, b) {
			return parseFloat(b.count) - parseFloat(a.count);
		}).slice(0,6).forEach(function(d){
			$( ".auton" ).append( '<div class="echo">'+d.word+'</div>' );
		});
	}
	else{
		$( ".auton" ).append( '<div class="nora">No Result</div>' );			
	}
}
$.getJSON('/autocomplete', function(d) {
	data=d;
});
$(".auton").hide();
$( ".autof" ).focus(function() {
	popu(data);
	$(".auton").show();
});
$( ".autof" ).focusout(function() {
	$(".auton").fadeOut();
});
$( ".autof" ).keyup(function() {
	var v=$('.autof').val();
	popu(data,v);
});
$(".auton").on('click',".echo",function(){
	$('.autof').val($(this).text());
});
</script>
@stop
