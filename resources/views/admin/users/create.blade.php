@extends("admin.layouts.app")

@section('title')
 {{trans('admin.create_user')}}
@endsection

@section("content")

<div class="card">
	  	    <h5 class="card-header text-primary">{{ trans("admin.create_user") }}</h5>

  <div class="card-body">

       {!! Form::open(['url' => route('users.store')]) !!}
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
       {!! Form::label('level',trans("admin.level"), ['class' => 'awesome']) !!} 
     
    {!! Form::select('level', ['user' => trans('admin.user'), 'vendor' => trans('admin.vendor'),'company' => trans('admin.company'),],old('level'), ['class' => 'form-control' ,'placeholder' => '.....']) !!}
         @if($errors->has('level'))
             <p class="text-danger text-uppercase">{{$errors->first('level')}}</p>
         @endif
    </div> 

     <div class="form-group">
       {!! Form::submit(trans("admin.btn-create"),['class' => 'btn btn-info']) !!}
     </div>  
    

       {!! Form::close() !!}


  </div>
</div>

@endsection