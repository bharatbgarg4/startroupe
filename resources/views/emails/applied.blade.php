<div class="head">

<h3>{{env('SITE_NAME')}}</h3>
</div>
<h2>New Job Application on {{ URL::to('job/' . $job->id) }}</h2>

<div>
    <h4>Info</h4>
    <p>Email: <b>{{$user->email}}</b></p>
    <p>Name: <b>{{$user->name}}</b></p>
    <p>Mobile: <b>{{$user->mobile}}</b></p>
</div>