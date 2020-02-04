@extends("admin.layouts.app")

@section('title')
 {{trans('admin.create')}}
@endsection

@section("content")

<div class="card">
	  	    <h5 class="card-header text-primary">{{ trans("admin.create") }}</h5>

  <div class="card-body">

       {!! Form::open(['url' => route('admin.store')]) !!}
     <div class="form-group">
       {!! Form::label('name', trans('admin.name'), ['class' => 'awesome']) !!} 
       {!! Form::text("name",old('name'),['class' => 'form-control']) !!}
         @if($errors->has('name'))
             <p class="text-danger text-uppercase">{{$errors->first('name')}}</p>
         @endif
    </div> 
    <div class="form-group">
       {!! Form::label('email', trans('admin.email'), ['class' => 'awesome']) !!} 
       {!! Form::email("email",old('email'),['class' => 'form-control']) !!}
         @if($errors->has('email'))
             <p class="text-danger text-uppercase">{{$errors->first('email')}}</p>
         @endif       
    </div>  
     <div class="form-group">
       {!! Form::label('password', trans('admin.password'), ['class' => 'awesome']) !!} 
       {!! Form::password("password",['class' => 'form-control']) !!}
         @if($errors->has('password'))
             <p class="text-danger text-uppercase">{{$errors->first('password')}}</p>
         @endif       
    </div> 
    <div class="form-group">
       {!! Form::label('password-confirmation', trans('admin.password_confirmation'), ['class' => 'awesome']) !!} 
       {!! Form::password("password_confirmation",['class' => 'form-control']) !!}
         @if($errors->has('password_confirmation'))
             <p class="text-danger text-uppercase">{{$errors->first('password_confirmation')}}</p>
         @endif       
    </div>

     <div class="form-group">
       {!! Form::submit(trans("admin.btn-create"),['class' => 'btn btn-info']) !!}
     </div>  
    

       {!! Form::close() !!}


  </div>
</div>

@endsection