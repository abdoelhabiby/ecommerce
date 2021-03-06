@extends("admin.layouts.app")

@section('title')
 {{trans('admin.editCountry')}}
@endsection

@section("content")

<div class="card">
          <h5 class="card-header text-primary">{{ trans("admin.editCountry") }}</h5>

  <div class="card-body">

    
       {!! Form::open(['url' => route('countries.update',$country->id),"files" => true]) !!}
       @method('PUT')
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('name_en', trans('admin.name_en'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_en",value($country->name_en),['class' => 'form-control']) !!}
         @if($errors->has('name_en'))
             <p class="text-danger text-uppercase">{{$errors->first('name_en')}}</p>
         @endif
    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('name_ar', trans('admin.name_ar'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_ar",value($country->name_ar),['class' => 'form-control']) !!}
         @if($errors->has('name_ar'))
             <p class="text-danger text-uppercase">{{$errors->first('name_ar')}}</p>
         @endif
    </div> 

  <!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('currency', trans('admin.currency'), ['class' => 'awesome']) !!} 
       {!! Form::text("currency",value($country->currency),['class' => 'form-control']) !!}
         @if($errors->has('currency'))
             <p class="text-danger text-uppercase">{{$errors->first('currency')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- --> 
   <div class="form-group">
       {!! Form::label('code_number', trans('admin.code_number'), ['class' => 'awesome']) !!} 
       {!! Form::text("code_number",value($country->code_number),['class' => 'form-control']) !!}
         @if($errors->has('code_number'))
             <p class="text-danger text-uppercase">{{$errors->first('code_number')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- -->  
  <div class="form-group">
       {!! Form::label('short_name', trans('admin.short_name'), ['class' => 'awesome']) !!} 
       {!! Form::text("short_name",value($country->short_name),['class' => 'form-control']) !!}
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
   
   @if(!empty($country->logo))
      
      <img src="{{ asset('storage/'.$country->logo) }}" width='100' height="100">

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