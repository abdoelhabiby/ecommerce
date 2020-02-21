@extends("admin.layouts.app")

@section('title')
 {{trans('admin.create_m')}}
@endsection



@section("content")



<div class="card">
	  	    <h5 class="card-header text-primary">{{ trans("admin.create_m") }}</h5>

  <div class="card-body">


       {!! Form::open(['url' => route('malls.store'),'files' => true]) !!}


   <div class="row">    
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group col-md-6">
       {!! Form::label('name_en', trans('admin.name_en'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_en",old('name_en'),['class' => 'form-control']) !!}
         @if($errors->has('name_en'))
             <p class="text-danger text-uppercase">{{$errors->first('name_en')}}</p>
         @endif
    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group col-md-6">
       {!! Form::label('name_ar',trans('admin.name_ar'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_ar",old('name_ar'),['class' => 'form-control']) !!}
         @if($errors->has('name_ar'))
             <p class="text-danger text-uppercase">{{$errors->first('name_ar')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- -->   

  <div class="form-group col-md-6">
       {!! Form::label('contact_name',trans('admin.contact_name'), ['class' => 'awesome']) !!} 
       {!! Form::text("contact_name",old('contact_name'),['class' => 'form-control']) !!}
         @if($errors->has('contact_name'))
             <p class="text-danger text-uppercase">{{$errors->first('contact_name')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- --> 

  <div class="form-group col-md-6">
       {!! Form::label('facebook',trans('admin.facebook'), ['class' => 'awesome']) !!} 
       {!! Form::text("facebook",old('facebook'),['class' => 'form-control']) !!}
         @if($errors->has('facebook'))
             <p class="text-danger text-uppercase">{{$errors->first('facebook')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- --> 

     <div class="form-group col-md-6">
       {!! Form::label('email',trans('admin.email'), ['class' => 'awesome']) !!} 
       {!! Form::email("email",old('email'),['class' => 'form-control']) !!}
         @if($errors->has('email'))
             <p class="text-danger text-uppercase">{{$errors->first('email')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------->

   <div class="form-group col-md-6">
       {!! Form::label('mobile',trans('admin.mobile'), ['class' => 'awesome']) !!} 
       {!! Form::text("mobile",old('mobile'),['class' => 'form-control']) !!}
         @if($errors->has('mobile'))
             <p class="text-danger text-uppercase">{{$errors->first('mobile')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------->


  <div class="form-group col-md-6">
       {!! Form::label('twitter',trans('admin.twitter'), ['class' => 'awesome']) !!} 
       {!! Form::text("twitter",old('twitter'),['class' => 'form-control']) !!}
         @if($errors->has('twitter'))
             <p class="text-danger text-uppercase">{{$errors->first('twitter')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- -->
   <div class="form-group col-md-6">
       {!! Form::label('website',trans('admin.website'), ['class' => 'awesome']) !!} 
       {!! Form::text("website",old('website'),['class' => 'form-control']) !!}
         @if($errors->has('website'))
             <p class="text-danger text-uppercase">{{$errors->first('website')}}</p>
         @endif
    </div> 



<!-- ---------------------------------------------------------------------------------------->

   <div class="form-group col-md-6">
       {!! Form::label('country_id',trans('admin.country'), ['class' => 'awesome']) !!} 
       {!! Form::select("country_id",$countries,old('country_id'),['class' => 'form-control', 'placeholder' => "......"]) !!}
         @if($errors->has('country_id'))
             <p class="text-danger text-uppercase">{{$errors->first('country_id')}}</p>
         @endif
    </div> 


    <!-- ---------------------------------------------------------------------------------------->

   <div class="form-group col-md-6">
       {!! Form::label('address',trans('admin.address'), ['class' => 'awesome']) !!} 
       {!! Form::text("address",old('address'),['class' => 'form-control address']) !!}
         @if($errors->has('address'))
             <p class="text-danger text-uppercase">{{$errors->first('address')}}</p>
         @endif
    </div>



<!-- ---------------------------------------------------------------------------------------->

</div>    <!-- end of raw -->


<div class="form-group">
       {!! Form::label('icon',trans("admin.icon_Mall"), ['class' => 'awesome']) !!} 
     
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