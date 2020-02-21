@extends("admin.layouts.app")

@section('title')
 {{trans('admin.create_m')}}
@endsection



@section("content")



<div class="card">
	  	    <h5 class="card-header text-primary">{{ trans("admin.create_m") }}</h5>

  <div class="card-body">


       {!! Form::open(['url' => route('shipping.store'),'files' => true]) !!}


<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('name_en', trans('admin.name_en'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_en",old('name_en'),['class' => 'form-control']) !!}
         @if($errors->has('name_en'))
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
       {!! Form::label('user_id',trans("admin.company_owner"), ['class' => 'awesome']) !!} 
     
    {!! Form::select('user_id',$users,old('user_id'), 
            ['class' => 'form-control user_id' ,'placeholder' => '.....']) !!}
         @if($errors->has('user_id'))
             <p class="text-danger text-uppercase">{{$errors->first('user_id')}}</p>
         @endif
    </div> 



<!-- ---------------------------------------------------------------------------------------->

   <div class="form-group">
       {!! Form::label('address',trans('admin.address'), ['class' => 'awesome']) !!} 
       {!! Form::text("address",old('address'),['class' => 'form-control address']) !!}
         @if($errors->has('address'))
             <p class="text-danger text-uppercase">{{$errors->first('address')}}</p>
         @endif
    </div> 



<!-- ---------------------------------------------------------------------------------------->

 <div class="form-group">
       {!! Form::label('icon',trans("admin.icon_ship"), ['class' => 'awesome']) !!} 
     
    {!! Form::file('icon',['class' => 'form-control']) !!}
         @if($errors->has('icon'))
             <p class="text-danger text-uppercase">{{$errors->first('icon')}}</p>
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