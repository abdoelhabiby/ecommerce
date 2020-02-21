@extends("admin.layouts.app")

@section('title')
 {{trans('admin.edit_m')}}
@endsection

@section("content")




<div class="card">
          <h5 class="card-header text-primary">{{ trans("admin.edit_m") }}</h5>

  <div class="card-body">

    
       {!! Form::open(['url' => route('manufacturers.update',$manufact->id),'files' => true]) !!}
       @method('PUT')

   <div class="row">    
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group col-md-6">
       {!! Form::label('name_en', trans('admin.name_en'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_en",value($manufact->name_en),['class' => 'form-control']) !!}
         @if($errors->has('name_en'))
             <p class="text-danger text-uppercase">{{$errors->first('name_en')}}</p>
         @endif
    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group col-md-6">
       {!! Form::label('name_ar',trans('admin.name_ar'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_ar",value($manufact->name_ar),['class' => 'form-control']) !!}
         @if($errors->has('name_ar'))
             <p class="text-danger text-uppercase">{{$errors->first('name_ar')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- -->   

  <div class="form-group col-md-6">
       {!! Form::label('contact_name',trans('admin.contact_name'), ['class' => 'awesome']) !!} 
       {!! Form::text("contact_name",value($manufact->contact_name),['class' => 'form-control']) !!}
         @if($errors->has('contact_name'))
             <p class="text-danger text-uppercase">{{$errors->first('contact_name')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- --> 

  <div class="form-group col-md-6">
       {!! Form::label('facebook',trans('admin.facebook'), ['class' => 'awesome']) !!} 
       {!! Form::text("facebook",value($manufact->facebook),['class' => 'form-control']) !!}
         @if($errors->has('facebook'))
             <p class="text-danger text-uppercase">{{$errors->first('facebook')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- --> 

     <div class="form-group col-md-6">
       {!! Form::label('email',trans('admin.email'), ['class' => 'awesome']) !!} 
       {!! Form::email("email",value($manufact->email),['class' => 'form-control']) !!}
         @if($errors->has('email'))
             <p class="text-danger text-uppercase">{{$errors->first('email')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------->

   <div class="form-group col-md-6">
       {!! Form::label('mobile',trans('admin.mobile'), ['class' => 'awesome']) !!} 
       {!! Form::text("mobile",value($manufact->mobile),['class' => 'form-control']) !!}
         @if($errors->has('mobile'))
             <p class="text-danger text-uppercase">{{$errors->first('mobile')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------->


  <div class="form-group col-md-6">
       {!! Form::label('twitter',trans('admin.twitter'), ['class' => 'awesome']) !!} 
       {!! Form::text("twitter",value($manufact->twitter),['class' => 'form-control']) !!}
         @if($errors->has('twitter'))
             <p class="text-danger text-uppercase">{{$errors->first('twitter')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- -->
   <div class="form-group col-md-6">
       {!! Form::label('website',trans('admin.website'), ['class' => 'awesome']) !!} 
       {!! Form::text("website",value($manufact->website),['class' => 'form-control']) !!}
         @if($errors->has('website'))
             <p class="text-danger text-uppercase">{{$errors->first('website')}}</p>
         @endif
    </div> 



<!-- ---------------------------------------------------------------------------------------->

   <div class="form-group col-md-6">
       {!! Form::label('address',trans('admin.address'), ['class' => 'awesome']) !!} 
       {!! Form::text("address",value($manufact->address),['class' => 'form-control']) !!}
         @if($errors->has('address'))
             <p class="text-danger text-uppercase">{{$errors->first('address')}}</p>
         @endif
    </div> 



<!-- ---------------------------------------------------------------------------------------->

 <div class="form-group col-md-6">
       {!! Form::label('icon',trans("admin.icon_manu"), ['class' => 'awesome']) !!} 
     
    {!! Form::file('icon',['class' => 'form-control']) !!}
         @if($errors->has('icon'))
             <p class="text-danger text-uppercase">{{$errors->first('icon')}}</p>
         @endif
    </div> 



</div>
    @if(!empty($manufact->icon))

       <img src="{{asset('storage/'.$manufact->icon)}}" width="75" height="75">
       <br>
       <br>

    @endif


<!-- ---------------------------------------------------------------------------------------- -->


  
     <div class="form-group">
       {!! Form::submit(trans("admin.btn-update"),['class' => 'btn btn-info']) !!}
     </div>  
   <!-- ----------------------------------------------------------------------------------------  -->

       {!! Form::close() !!}


  </div>
</div>

@endsection