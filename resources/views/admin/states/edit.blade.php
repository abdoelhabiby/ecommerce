@extends("admin.layouts.app")

@section('title')
 {{trans('admin.UpdateState')}}
@endsection

@section("content")

@push('scripts')

<script type="text/javascript">
   
   $(function(){

    
    @if(old('country_id'))

          $.ajax({

              url: '{{route("states.city")}}',
              method : 'get',
              data:{country:"{{old('country_id')}}",select:"{{old('city_id')}}"},
              dataType:'html',
              success:function(data){

                $(".appendCity").html(data);
              },
              error:function(error){
                console.log(error);

                $(".appendCity").html(' ');
              }

          });


    @endif

     
     $('.country_id').on('change',function(){
        
        var country_id = $(".country_id option:selected").val();

        if(country_id > 0){
          
          $.ajax({

              url: '{{route("states.city")}}',
              method : 'get',
              data:{country:country_id},
              dataType:'html',
              success:function(data){

                $(".test").html(data);

              },
              error:function(error){

                $(".test").html(' ');

              }

          });
        }else{
          $(".test").html(' ');
        }
           
     });
      
   });

</script>



@endpush


<div class="card">
          <h5 class="card-header text-primary">{{ trans("admin.UpdateState") }}</h5>

  <div class="card-body">

    
       {!! Form::open(['url' => route('states.update',$state->id)]) !!}
        @method('PUT')
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('state_name_en', trans('admin.state_name_en'), ['class' => 'awesome']) !!} 
       {!! Form::text("state_name_en",value($state->state_name_en),['class' => 'form-control']) !!}
         @if($errors->has('state_name_en'))
             <p class="text-danger text-uppercase">{{$errors->first('state_name_en')}}</p>
         @endif
    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('state_name_ar', trans('admin.state_name_ar'), ['class' => 'awesome']) !!} 
       {!! Form::text("state_name_ar",value($state->state_name_ar),['class' => 'form-control']) !!}
         @if($errors->has('state_name_ar'))
             <p class="text-danger text-uppercase">{{$errors->first('state_name_ar')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- --> 


     <div class="form-group">
       {!! Form::label('country_id',trans("admin.country_id"), ['class' => 'awesome']) !!} 
     
    {!! Form::select('country_id',\App\Countries::pluck('name_'.langLocal(),'id'),value($state->country_id), 
            ['class' => 'form-control country_id' ,'placeholder' => '.....']) !!}
         @if($errors->has('country_id'))
             <p class="text-danger text-uppercase">{{$errors->first('country_id')}}</p>
         @endif
    </div> 


<!-- ---------------------------------------------------------------------------------------- -->

     <div class="form-group test">
       {!! Form::label('city_id',trans("admin.city_id"), ['class' => 'awesome']) !!} 
     
    {!! Form::select('city_id',\App\city::pluck('city_name_'.langLocal(),'id'),value($state->city_id), 
            ['class' => 'form-control' ,'placeholder' => '.....']) !!}
         @if($errors->has('city_id'))
             <p class="text-danger text-uppercase">{{$errors->first('city_id')}}</p>
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