<div class="userBox">


			<div class="user-box-img"><img src="{{$user->imgUrl}}" width="100%">
				<img src="/images/ea-play.svg" width="100%" class="hover-img">


				<a href="/profile/{{$user->username}}">
				@if($user->talent)
				<h3> {{$user->talent->title}} </h3>
					@else
					<h3> Talent </h3>
					@endif
				</a>
</div>

			<div class="hover-info"><!--
				<p class="bio"> {{$user->bio}} </p>
			-->
			<p class="bio">   {{$user->name}}
 </p>

					@if($user->location)
					<h5> {{$user->location->title}} </h5>
					@else
					<h3> Location </h3>
					@endif

					<ul>
						<li>

								<img src="/images/star.png">

						</li>
						<li>

								<img src="/images/star.png">

						</li>
						<li>

								<img src="/images/star.png">

						</li>
						<li>

								<img src="/images/star.png">

						</li>
						<li>

								<img src="/images/star.png">

						</li>
						<li>5.00</li>


					</ul>
			</div>




</div><!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>