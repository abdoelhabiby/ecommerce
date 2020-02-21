@extends("admin.layouts.app")

@section('title')
 {{trans('admin.create_m')}}
@endsection

@section("content")




<div class="card">
	  	    <h5 class="card-header text-primary">{{ trans("admin.create_m") }}</h5>

  <div class="card-body">

    
       {!! Form::open(['url' => route('sizes.store'),'files' => true]) !!}
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('name_en', trans('admin.name_en'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_en",old('name_en'),['class' => 'form-control']) !!}
         @if($errors->has('cite_en'))
             <p class="text-danger text-uppercase">{{$errors->first('name_en')}}</p>
         @endif
    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('name_ar',trans('admin.name_ar'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_ar",old('name_ar'),['class' => 'form-control']) !!}
         @if($errors->has('name_ar'))
             <p class="text-danger text-uppercase">{{$errors->first('name_ar')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- --> 
    <div class="form-group">
       {!! Form::label('category_id',trans('admin.category'), ['class' => 'awesome']) !!} 
       {!! Form::select("category_id",\App\Model\Category::pluck('categ_name_'.langLocal(),'id'),old('category_id'),['class' => 'form-control','placeholder' => "....."]) !!}
         @if($errors->has('category_id'))
             <p class="text-danger text-uppercase">{{$errors->first('category_id')}}</p>
         @endif
    </div> 

 

<!-- ---------------------------------------------------------------------------------------- -->


    <div class="form-group">
       {!! Form::label('is_public',trans('admin.is_public'), ['class' => 'awesome']) !!} 
       {!! Form::select("is_public"
       ,['yes' => trans('admin.yes'),'no' => trans('admin.no')]
       ,old('is_public'),['class' => 'form-control']) !!}
         @if($errors->has('is_public'))
             <p class="text-danger text-uppercase">{{$errors->first('is_public')}}</p>
         @endif
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