<div class="userBox">
	<a href="/profile/{{$user->username}}">
		<div class="user-box-img"><img src="{{$user->imgUrl}}" width="100%">
			@if(isset($hover))
			@else
			<img  data-toggle="modal" data-target="#userbox-modal" src="/images/ea-play.svg" width="100%" class="hover-img" />
			@endif
			@if($user->talent)
			<h3> {{$user->talent->title}} </h3>
			@else
			<h3> Talent </h3>
			@endif
		</div>
		<div class="hover-info">
			<p class="bio">   {{$user->name}}	</p>
			@if($user->location)
			<h5> {{$user->location->title}} </h5>
			@else
			<h3> Location </h3>
			@endif

			<ul>
				<li><img src="/images/star.png"></li>
				<li><img src="/images/star.png"></li>
				<li><img src="/images/star.png"></li>
				<li><img src="/images/star.png"></li>
				<li><img src="/images/star.png"></li>
				<li>5.00</li>
			</ul>
		</div>
	</a>
</div>