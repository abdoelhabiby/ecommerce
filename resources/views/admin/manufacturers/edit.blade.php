@extends("admin.layouts.app")

@section('title')
 {{trans('admin.editTrade')}}
@endsection

@section("content")




<div class="card">
          <h5 class="card-header text-primary">{{ trans("admin.editTrade") }}</h5>

  <div class="card-body">

    
       {!! Form::open(['url' => route('trademark.update',$trade->id),'files' => true]) !!}
       @method('PUT')
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('name_en', trans('admin.name_en'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_en",value($trade->name_en),['class' => 'form-control']) !!}
         @if($errors->has('cite_en'))
             <p class="text-danger text-uppercase">{{$errors->first('name_en')}}</p>
         @endif
    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('name_ar',trans('admin.name_ar'), ['class' => 'awesome']) !!} 
       {!! Form::text("name_ar",value($trade->name_ar),['class' => 'form-control']) !!}
         @if($errors->has('name_ar'))
             <p class="text-danger text-uppercase">{{$errors->first('name_ar')}}</p>
         @endif
    </div>
    
  
<!-- ---------------------------------------------------------------------------------------- --> 


 



     <div class="form-group">
       {!! Form::label('logo',trans("admin.logo"), ['class' => 'awesome']) !!} 
     
    {!! Form::file('logo',['class' => 'form-control']) !!}
         @if($errors->has('logo'))
             <p class="text-danger text-uppercase">{{$errors->first('logo')}}</p>
         @endif
    </div> 

@if(!empty($trade->logo))
    <div>
        <img src="{{asset('storage/'.$trade->logo)}}" width="75" height="75">
    </div> 
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