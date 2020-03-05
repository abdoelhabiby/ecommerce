  <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">

    <div class="form-group">
       {!! Form::label('other_data',trans('admin.other_data'), ['class' => 'awesome']) !!} 
       {!! Form::textarea("other_data",old('other_data'),['class' => 'form-control ckeditor']) !!}

    </div> 


 
  </div>
