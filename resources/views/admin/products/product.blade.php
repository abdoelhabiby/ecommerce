@extends("admin.layouts.app")

@section('title')
 {{trans('admin.edit_m')}}
@endsection

@push('scripts')

<script type="text/javascript">
  $(function(){
   
   $(".copy_product").click(function(){

   var title =  $('.checkTitle').val();
   var theError = `Sorry Cannot copy empty !!!`;


   if(title.length > 0){


       $.ajax({

          url:"{{route('copyProduct',$product->id)}}",
          method:'POST',
          data:{_token:"{{csrf_token()}}",titlePro:title},
          beforeSend:function(){
            $('.loaddingSpin').removeClass('d-none');

          },
          success:function(data){

            setTimeout(function(){

               $('.loaddingSpin').addClass('d-none');
               $('.addSuccess .addText').html(data.success);
               $('.addSuccess').removeClass('d-none');

               window.location.href = "{{url('dashboard/products')}}/"+data.id+"/edit";

            },3000)
              
          },
          error: function(data){
            $('.loaddingSpin').addClass('d-none');
            $('.showError').removeClass('d-none');
            $('.showError .errorText').html(theError);
          }

       });

   }else{


        $('.showError').removeClass('d-none');
        $('.showError .errorText').html(theError);

   }


   });
  

  });
</script>

@endpush


@section("content")


<div class="alert alert-danger alert-dismissible fade show showError d-none" role="alert">
  <strong>Error</strong> <span class="errorText"></span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="alert alert-success alert-dismissible fade show addSuccess d-none" role="alert">
  <strong>Success</strong> <span class="addText"> </span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


<div class="card">
   <div class="card-header">
	  	    <h4 class="text-primary float-left">{{ trans("admin.create_m") }}</h4>

  <div class="float-right">
          <button class="btn btn-success copy_product">
            <i class="fa fa-copy"> </i>   
            {{trans('admin.copy')}} <i class="fas fa-sync fa-spin loaddingSpin d-none"></i>
            </button>
            <div class="form-group" style="display: inline;">
             {!! Form::submit(trans("admin.save"),['class' => 'btn btn-info','form' => 'toForm']) !!}
           </div> 


</div>
          <div class="clearfix"></div>

   </div>
  <div class="card-body">

    
       {!! Form::open(['url' => route('products.update',$product->id),'files' => true,'class' => 'myForm','id' => 'toForm']) !!}
       @method('PUT')
<!-- ---------------------------------------------------------------------------------------- -->


<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#about" role="tab" aria-controls="home" aria-selected="true">{{trans('admin.about_product')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#category" role="tab" aria-controls="profile" aria-selected="false">{{trans('admin.category')}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="contact" aria-selected="false">{{trans('admin.setting_product')}}</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#media" role="tab" aria-controls="contact" aria-selected="false">{{trans('admin.media')}}</a>
  </li>

 <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#aboutShipping" role="tab" aria-controls="contact" aria-selected="false">{{trans('admin.about_shipping')}}</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#other" role="tab" aria-controls="contact" aria-selected="false">{{trans('admin.other')}}</a>
  </li> 

   <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#related_products" role="tab" aria-controls="contact" aria-selected="false">{{trans('admin.related_products')}}</a>
  </li> 

</ul>


<div class="tab-content" id="myTabContent">
  @include('admin.products.tabs._about')
  @include('admin.products.tabs._category')
  @include('admin.products.tabs._setting')
  @include('admin.products.tabs._about_shipping')
  @include('admin.products.tabs._media')
  @include('admin.products.tabs._other')
  @include('admin.products.tabs._related_products')

</div>


   <!-- ----------------------------------------------------------------------------------------  -->

     <div class="clearfix"></div>
       {!! Form::close() !!}






  </div>
</div>

@endsection