@extends("admin.layouts.app")

@section('title')
 {{trans('admin.editCity')}}
@endsection

@section("content")




<div class="card">
          <h5 class="card-header text-primary">{{ trans("admin.editCity") }}</h5>

  <div class="card-body">

    
       {!! Form::open(['url' => route('cities.update',$city->id)]) !!}
       @method('PUT')
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('city_name_en', trans('admin.city_name_en'), ['class' => 'awesome']) !!} 
       {!! Form::text("city_name_en",value($city->city_name_en),['class' => 'form-control']) !!}
         @if($errors->has('city_name_en'))
             <p class="text-danger text-uppercase">{{$errors->first('city_name_en')}}</p>
         @endif
    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('city_name_ar', trans('admin.city_name_ar'), ['class' => 'awesome']) !!} 
       {!! Form::text("city_name_ar",value($city->city_name_ar),['class' => 'form-control']) !!}
         @if($errors->has('city_name_ar'))
             <p class="text-danger text-uppercase">{{$errors->first('city_name_ar')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- --> 


 



     <div class="form-group">
       {!! Form::label('country_id',trans("admin.country_id"), ['class' => 'awesome']) !!} 
     
    {!! Form::select('country_id',\App\Countries::pluck('name_'.langLocal(),'id'),value($city->country_id), 
            ['class' => 'form-control' ,'placeholder' => '.....']) !!}
         @if($errors->has('country_id'))
             <p class="text-danger text-uppercase">{{$errors->first('country_id')}}</p>
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