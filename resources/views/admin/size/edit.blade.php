@extends("admin.layouts.app")

@section('title')
 {{trans('admin.edit_m')}}
@endsection

@section("content")




<div class="card">
          <h5 class="card-header text-primary">{{ trans("admin.edit_m") }}</h5>

  <div class="card-body">

    
       {!! Form::open(['url' => route('sizes.update',$size->id),'files' => true]) !!}
       @method('PUT')
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('name_en', trans('admin.name_en'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_en",value($size->name_en),['class' => 'form-control']) !!}
         @if($errors->has('cite_en'))
             <p class="text-danger text-uppercase">{{$errors->first('name_en')}}</p>
         @endif
    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('name_ar',trans('admin.name_ar'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_ar",value($size->name_ar),['class' => 'form-control']) !!}
         @if($errors->has('name_ar'))
             <p class="text-danger text-uppercase">{{$errors->first('name_ar')}}</p>
         @endif
    </div>
    <!-- ---------------------------------------------------------------------------------------- -->

    <div class="form-group">
       {!! Form::label('category_id',trans('admin.category'), ['class' => 'awesome']) !!} 
       {!! Form::select("category_id",\App\Model\Category::pluck('categ_name_'.langLocal(),'id'),
       value($size->category_id),['class' => 'form-control','placeholder' => "....."]) !!}
         @if($errors->has('category_id'))
             <p class="text-danger text-uppercase">{{$errors->first('category_id')}}</p>
         @endif
    </div> 

 

<!-- ---------------------------------------------------------------------------------------- -->


    <div class="form-group">
       {!! Form::label('is_public',trans('admin.is_public'), ['class' => 'awesome']) !!} 
       {!! Form::select("is_public"
       ,['yes' => trans('admin.yes'),'no' => trans('admin.no')]
       ,value($size->is_public),['class' => 'form-control']) !!}
         @if($errors->has('is_public'))
             <p class="text-danger text-uppercase">{{$errors->first('is_public')}}</p>
         @endif
    </div>

<!-- ---------------------------------------------------------------------------------------- -->

  
     <div class="form-group">
       {!! Form::submit(trans("admin.btn-update"),['class' => 'btn btn-info']) !!}
     </div>  
   <!-- ----------------------------------------------------------------------------------------  -->

       {!! Form::close() !!}


  </div>
</div>

@endsection