@extends("admin.layouts.app")

@section('title')
 {{trans('admin.createCategory')}}
@endsection

@section("content")




<div class="card">
	  	    <h5 class="card-header text-primary">{{ trans("admin.createCategory") }}</h5>

  <div class="card-body">

    
       {!! Form::open(['url' => route('categories.store'),'files' => true]) !!}
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('categ_name_en', trans('admin.categ_name_en'), ['class' => 'awesome']) !!} 
       {!! Form::text("categ_name_en",old('categ_name_en'),['class' => 'form-control']) !!}
         @if($errors->has('categ_name_en'))
             <p class="text-danger text-uppercase">{{$errors->first('categ_name_en')}}</p>
         @endif
    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('categ_name_ar', trans('admin.categ_name_ar'), ['class' => 'awesome']) !!} 
       {!! Form::text("categ_name_ar",old('categ_name_ar'),['class' => 'form-control']) !!}
         @if($errors->has('categ_name_ar'))
             <p class="text-danger text-uppercase">{{$errors->first('categ_name_ar')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- --> 

@if($categ->count() > 0)
     <div class="form-group">
       {!! Form::label('parent_id',trans("admin.parent_id"), ['class' => 'awesome']) !!} 
     
    {!! Form::select('parent_id',$categ,old('parent_id'), 
            ['class' => 'form-control' ,'placeholder' => '.....']) !!}
         @if($errors->has('parent_id'))
             <p class="text-danger text-uppercase">{{$errors->first('parent_id')}}</p>
         @endif
    </div> 
@endif

<!-- ---------------------------------------------------------------------------------------- -->


     <div class="form-group">
       {!! Form::label('description',trans("admin.description"), ['class' => 'awesome']) !!} 
     
    {!! Form::textarea('description',null,['class' => 'form-control','rows' => 4, 'cols' => 54, 'style' => 'resize:none'],old('description')) !!}
         @if($errors->has('description'))
             <p class="text-danger text-uppercase">{{$errors->first('description')}}</p>
         @endif
    </div> 



<!-- ---------------------------------------------------------------------------------------- --> 

     <div class="form-group">
       {!! Form::label('keywords',trans("admin.keywords"), ['class' => 'awesome']) !!} 
     
    {!! Form::textarea('keywords',null,['class' => 'form-control','rows' => 4, 'cols' => 54, 'style' => 'resize:none'],old('keywords')) !!}
         @if($errors->has('keywords'))
             <p class="text-danger text-uppercase">{{$errors->first('keywords')}}</p>
         @endif
    </div> 



<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('logo',trans("admin.logo"), ['class' => 'awesome']) !!} 
       {!! Form::file('logo',['class' => 'form-control']) !!}
   </div>
<!-- ---------------------------------------------------------------------------------------- -->
  
     <div class="form-group">
       {!! Form::submit(trans("admin.btn-create"),['class' => 'btn btn-info']) !!}
     </div>  
   <!-- ----------------------------------------------------------------------------------------  -->

       {!! Form::close() !!}


  </div>
</div>

@endsection