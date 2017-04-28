@extends('layouts.dashboard')

@section('dashboardcontent')

@if(!Auth::user()->mobile)
<h1>Mobile No. needs to be Verified.</h1>
@else
<h3>Current Mobile No. {{Auth::user()->mobile}}</h3>
@endif

Update your Mobile No.
{!!Form::open(['url'=>'dashboard/mobile'])!!}
<div class="form-group">
{!! Form::text('mobile',null,['placeholder'=>'Mobile','class'=>'form-control']) !!}
<p>Enter Mobile No. without IST code eg. 8283865488</p>
</div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Send me Verification Code</button>
    </div>
</form>

@if(Auth::user()->vmobile)
<h3>Verify {{Auth::user()->vmobile}}</h3>
{!!Form::open(['url'=>'dashboard/mobileVerify'])!!}
<div class="form-group">
{!! Form::text('otp',null,['placeholder'=>'Verification Code','class'=>'form-control']) !!}
</div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
<a href="/dashboard/resend/otp">Resend Verification Code</a>
@endif


@stop