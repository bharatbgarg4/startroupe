@if (session('status'))
    <div class="alert alert-success notification notification-success">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ session('status') }}</p>
    </div>
@endif
@if (session('status-danger'))
    <div class="alert alert-danger notification notification-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ session('status-danger') }}</p>
    </div>
@endif
@if (session('status-alert'))
    <div class="alert alert-warning notification notification-warning">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ session('status-alert') }}</p>
    </div>
@endif
@if($errors->any())
<div class="alert alert-danger notification notification-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    @foreach($errors->all() as $error)
        <p class="error-not">{{$error}}</p>
    @endforeach 
</div>
@endif