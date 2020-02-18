@extends("admin.layouts.app")

@section('title')
 {{trans('admin.setting')}}
@endsection

@section("content")


@if(session()->has("success"))

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> {{session('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


@endif





<div class="card">
          <h5 class="card-header text-primary">{{ trans("admin.edit_setting") }}</h5>

  <div class="card-body">

       {!! Form::open(['url' => route('setingPo'),"files" => true]) !!}
       @method("PUT")
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('name_en', trans('admin.set_name_en'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_en",value(setting()->name_en),['class' => 'form-control']) !!}
         @if($errors->has('name_en'))
             <p class="text-danger text-uppercase">{{$errors->first('name_en')}}</p>
         @endif
    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('name_ar', trans('admin.set_name_ar'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_ar",value(setting()->name_ar),['class' => 'form-control']) !!}
         @if($errors->has('name_ar'))
             <p class="text-danger text-uppercase">{{$errors->first('name_ar')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('email', trans('admin.email'), ['class' => 'awesome']) !!} 
       {!! Form::email("email",value(setting()->email),['class' => 'form-control']) !!}
         @if($errors->has('email'))
             <p class="text-danger text-uppercase">{{$errors->first('email')}}</p>

         @endif
    </div>              
<!-- ---------------------------------------------------------------------------------------- -->

    <div class="form-group">
       {!! Form::label("logo",trans("admin.logo")) !!}
       {!! Form::file("logo",['class' => "form-control"]) !!}

       @if($errors->has('logo'))
         <p class="text-danger text-uppercase">{{$errors->first('logo')}}</p>

       @endif

       @if(!empty(setting()->logo))
         <img src="{{ asset('storage/'.setting()->logo) }}" width="100px" height="100px">
       @endif
    </div> 
<!-- ====================================================================================== -->
    <div class="form-group">
       {!! Form::label("icon",trans("admin.icon")) !!}
       {!! Form::file("icon",['class' => "form-control"]) !!}

     @if($errors->has('icon'))
         <p class="text-danger text-uppercase">{{$errors->first('icon')}}</p>

       @endif


       @if(!empty(setting()->icon))
         <img src="{{ asset('storage/'.setting()->icon) }}" width="100px" height="100px">
       
       @endif

    </div>
<!-- ---------------------------------------------------------------------------------------- -->
   <div class="form-group">

     {!! Form::label("description",trans('admin.descrip')) !!}

      {!! Form::textarea('description',value(setting()->description), ['class'=>'form-control']) !!}
   </div>
<!-- ---------------------------------------------------------------------------------------- -->
   <div class="form-group">

     {!! Form::label("keywords",trans('admin.keywords')) !!}

      {!! Form::textarea('keywords', value(setting()->keywords), ['class'=>'form-control']) !!}
   </div>

<!-- ---------------------------------------------------------------------------------------- -->
   <div class="form-group">

     {!! Form::label("maintenance_message",trans('admin.maintenance_message')) !!}

      {!! Form::textarea('maintenance_message', value(setting()->maintenance_message), ['class'=>'form-control']) !!}
   </div>

<!-- ---------------------------------------------------------------------------------------- -->
  <div class="form-group">
       {!! Form::label('status',trans("admin.status"), ['class' => 'awesome']) !!} 
     
    {!! Form::select('status', ['open' => trans('admin.open'), 'close' => trans('admin.close')],value(setting()->status) ,['class' => 'form-control' ,'placeholder' => '.....']) !!}
         @if($errors->has('status'))
             <p class="text-danger text-uppercase">{{$errors->first('status')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- -->
<!-- ---------------------------------------------------------------------------------------- -->

     <div class="form-group">
       {!! Form::label('main_lang',trans("admin.main_lang"), ['class' => 'awesome']) !!} 
     
    {!! Form::select('main_lang', ['ar' => trans('admin.ar'), 'en' => trans('admin.en')],
    value(setting()->main_lang) ,['class' => 'form-control' ,'placeholder' => '.....']) !!}
         @if($errors->has('main_lang'))
             <p class="text-danger text-uppercase">{{$errors->first('main_lang')}}</p>
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