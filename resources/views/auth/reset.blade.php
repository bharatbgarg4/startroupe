@extends ('layouts.page')

@section('pagecontent')
<div class="col-lg-8 col-lg-offset-2">
<form method="POST" action="/password/reset">
    {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">
    
    <div class="form-group">
        Email
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group">
        Password
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        Confirm Password
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            Reset Password
        </button>
    </div>
</form>
</div>
@stop