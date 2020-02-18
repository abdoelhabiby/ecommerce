@extends("admin.layouts.app")



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

                $(".appendCity").html(data);

              },
              error:function(error){

                $(".appendCity").html(' ');

              }

          });
        }else{
          $(".appendCity").html(' ');
        }
           
     });
      
   });

</script>



@endpush



@section('title')
 {{trans('admin.createState')}}
@endsection

@section("content")




<div class="card">
	  	    <h5 class="card-header text-primary">{{ trans("admin.createState") }}</h5>

  <div class="card-body">

    
       {!! Form::open(['url' => route('states.store')]) !!}
<!-- ---------------------------------------------------------------------------------------- -->
     <div class="form-group">
       {!! Form::label('state_name_en', trans('admin.state_name_en'), ['class' => 'awesome']) !!} 
       {!! Form::text("state_name_en",old('state_name_en'),['class' => 'form-control']) !!}
         @if($errors->has('state_name_en'))
             <p class="text-danger text-uppercase">{{$errors->first('state_name_en')}}</p>
         @endif
    </div>   
<!-- ---------------------------------------------------------------------------------------- -->
    <div class="form-group">
       {!! Form::label('state_name_ar', trans('admin.state_name_ar'), ['class' => 'awesome']) !!} 
       {!! Form::text("state_name_ar",old('state_name_ar'),['class' => 'form-control']) !!}
         @if($errors->has('state_name_ar'))
             <p class="text-danger text-uppercase">{{$errors->first('state_name_ar')}}</p>
         @endif
    </div> 
<!-- ---------------------------------------------------------------------------------------- --> 


     <div class="form-group">
       {!! Form::label('country_id',trans("admin.country_id"), ['class' => 'awesome']) !!} 
     
    {!! Form::select('country_id',\App\Countries::pluck('name_'.langLocal(),'id'),old('country_id'), 
            ['class' => 'form-control country_id' ,'placeholder' => '.....']) !!}
         @if($errors->has('country_id'))
             <p class="text-danger text-uppercase">{{$errors->first('country_id')}}</p>
         @endif
    </div> 


<!-- ---------------------------------------------------------------------------------------- -->

<span class="appendCity"></span>
<!-- ---------------------------------------------------------------------------------------- -->

  
     <div class="form-group">
       {!! Form::submit(trans("admin.btn-create"),['class' => 'btn btn-info']) !!}
     </div>  
   <!-- ----------------------------------------------------------------------------------------  -->

       {!! Form::close() !!}


  </div>
</div>

@endsection