<div class="head">
	<h3>{{env('SITE_NAME')}}</h3>
</div>
<p>Click here to reset your password: {{ url('password/reset/'.$token) }}</p>
