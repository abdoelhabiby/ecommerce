@extends("admin.layouts.app")

@section('title')
 {{trans('admin.createCountry')}}
@endsection

@section("content")

<div class="card">
	  	    <h5 class="card-header text-primary">{{ trans("admin.createCountry") }}</h5>

  <div class="card-body">

    
       {!! Form::open(['url' => route('countries.store'),"files" => true]) !!}
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
       {!! Form::label('name_ar', trans('admin.name_ar'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_ar",old('name_ar'),['class' => 'form-control']) !!}
         @if($errors->has('name_ar'))
             <p class="text-danger text-uppercase">{{$errors->first('name_ar')}}</p>
         @endif
    </div> 

<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('currency', trans('admin.currency'), ['class' => 'awesome']) !!} 
       {!! Form::text("currency",old('currency'),['class' => 'form-control']) !!}
         @if($errors->has('currency'))
             <p class="text-danger text-uppercase">{{$errors->first('currency')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- --> 
   <div class="form-group">
       {!! Form::label('code_number', trans('admin.code_number'), ['class' => 'awesome']) !!} 
       {!! Form::text("code_number",old('code_number'),['class' => 'form-control']) !!}
         @if($errors->has('code_number'))
             <p class="text-danger text-uppercase">{{$errors->first('code_number')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- -->  
  <div class="form-group">
       {!! Form::label('short_name', trans('admin.short_name'), ['class' => 'awesome']) !!} 
       {!! Form::text("short_name",old('short_name'),['class' => 'form-control']) !!}
         @if($errors->has('short_name'))
             <p class="text-danger text-uppercase">{{$errors->first('short_name')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- -->

    <div class="form-group">
       {!! Form::label("logo",trans("admin.logo")) !!}
       {!! Form::file("logo",['class' => "form-control"]) !!}

       @if($errors->has('logo'))
         <p class="text-danger text-uppercase">{{$errors->first('logo')}}</p>

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