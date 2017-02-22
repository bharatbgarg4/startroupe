<div class="userBox">
	<a href="/profile/{{$user->username}}">

			<div class="user-box-img"><img src="{{$user->imgUrl}}" width="100%"></div>
			<h3> {{$user->name}} </h3>
			<div class="hover-info">

					@if($user->talent)
					<h4> {{$user->talent->title}} </h4>
					@else
					<h4> Talent </h4>
					@endif

					@if($user->location)
					<h5> {{$user->location->title}} </h5>
					@else
					<h3> Location </h3>
					@endif

				<p class="bio"> {{$user->bio}} </p>
			</div>


	</a>
</div>