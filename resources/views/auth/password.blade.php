@extends ('layouts.page')

@section('pagecontent')
<div class="col-lg-8 col-lg-offset-2">
<form method="POST" action="/password/email">
    {!! csrf_field() !!}

    <div class="form-group">
        Email
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary centered">
            Send Password Reset Link
        </button>
    </div>
</form>
</div>
@stop