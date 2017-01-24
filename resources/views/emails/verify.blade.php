<div class="head">

<h3>{{env('SITE_NAME')}}</h3>
</div>
<h2>Verify Your Email Address</h2>

<div>
    Thanks for creating an account with {{env('SITE_NAME')}}.
    Please follow the link below to verify your email address
    {{ URL::to('register/verify/' . $token) }}.<br/>
</div>