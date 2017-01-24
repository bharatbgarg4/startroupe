<div id="ImageModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Image</h4>
      </div>
      <div class="modal-body">
      {!!Form::open(['url'=>'/dashboard/images','files' => true])!!}
        <div class="form-group">
          {!! Form::label('title','Title') !!}
          {!! Form::text('title',null,['placeholder'=>'Enter the title','class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('Image') !!}
          {!! Form::file('image_file', null,['class'=>'btn btn-primary']) !!}
        </div>
        <div class="form-group">
          <input class="btn btn-primary" type="submit">
        </div>
      {!!Form::close()!!}
    </div>        
  </div>
</div>
</div>