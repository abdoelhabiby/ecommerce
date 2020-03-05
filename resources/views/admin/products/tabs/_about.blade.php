<div class="tab-pane fade show active mt-2" id="about" role="tabpanel" aria-labelledby="about-tab">
    <div class="form-group">
       {!! Form::label('title',trans('admin.title'), ['class' => 'awesome']) !!} 
       {!! Form::text("title",value($product->title),['class' => 'form-control','placeholder' => trans('admin.title')]) !!}

    </div> 

<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('content',trans('admin.content_pro'), ['class' => 'awesome']) !!} 
       {!! Form::textarea("content",value($product->content),['class' => 'form-control ckeditor']) !!}
  
    </div> 

</div>
