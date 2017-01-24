<div id="message" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Leave us a Message</h4>
      </div>
      <div class="modal-body">
       {!!Form::open(['url'=>'message'])!!}
       <div class="form-group">
        {!! Form::label('Name') !!}
        {!! Form::text('name',null,['placeholder'=>'Name','class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('Email') !!}
        {!! Form::text('email',null,['placeholder'=>'Email','class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('Mobile') !!}
        {!! Form::text('mobile',null,['placeholder'=>'Mobile','class'=>'form-control']) !!}
      </div>
       <div class="form-group">
        {!! Form::label('Message') !!}
        {!! Form::textarea('message',null,['id'=>'editor','placeholder'=>'Enter the Message','class'=>'form-control','rows'=>3]) !!}
        </div>

      </div>
      <div class="modal-footer">
        <div class="form-group">
          {!! Form::submit('Send',['class'=>'btn btn-primary','name'=>"submit"]) !!}
        </div>
        {!!Form::close()!!}
      </div>
    </div>

  </div>
</div>