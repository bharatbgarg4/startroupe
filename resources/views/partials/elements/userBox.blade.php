<div class="userBox">
	<a href="/profile/{{$user->username}}">
		<span>
			<img src="{{$user->imgUrl}}" width="100%">
			<h3> {{$user->name}} </h3>
			<div class="row">
				<div class="col col-sm-6">
					@if($user->talent)
					<h4> {{$user->talent->title}} </h4>
					@else
					<h4> Talent </h4>
					@endif
				</div>
				<div class="col col-sm-6">
					@if($user->location)
					<h4> {{$user->location->title}} </h4>
					@else
					<h4> Location </h4>
					@endif

				</div>
			</div>
			<p class="bio"> {{$user->bio}} </p>
		</span>
	</a>
</div>