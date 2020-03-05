@push('scripts')

<script type="text/javascript">
	$(function(){

		$(".checkStat").change(function(){

		       if($(".checkStat option:selected").val() == 'refused'){
                   $('.ifRefused').removeClass('d-none');
		           
		       }else{
		       	 $('.ifRefused').addClass('d-none');
		       }

		});

 

	});
</script>

@endpush

<div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">

<div class="row">



  <div class="form-group col-lg-4 col-md-4 col-sm-6">
       {!! Form::label('price',trans('admin.price'), ['class' => 'awesome']) !!} 
       {!! Form::number("price",value($product->price),['class' => 'form-control','placeholder' => trans('admin.price'),'step' => '0.01']) !!}

  </div> 

<!--  ---------------------------------------------------------------------------------- -->  
  <div class="form-group col-lg-4 col-md-4 col-sm-6">
       {!! Form::label('stock',trans('admin.stock'), ['class' => 'awesome']) !!} 
       {!! Form::number("stock",value($product->stock),['class' => 'form-control','placeholder' => trans('admin.stock')]) !!}

  </div> 

<!--  ---------------------------------------------------------------------------------- --> 

 <div class="form-group col-lg-4 col-md-4 col-sm-6">
       {!! Form::label('start_at',trans('admin.start_at'), ['class' => 'awesome']) !!} 
       {!! Form::date("start_at",value($product->start_at),['class' => 'form-control']) !!}

  </div> 

<!--  ---------------------------------------------------------------------------------- -->
 <div class="form-group col-lg-4 col-md-4 col-sm-6">
       {!! Form::label('end_at',trans('admin.end_at'), ['class' => 'awesome']) !!} 
       {!! Form::date("end_at",value($product->end_at),['class' => 'form-control']) !!}

  </div> 

<!--  ---------------------------------------------------------------------------------- -->
  <div class="form-group col-lg-4 col-md-4 col-sm-6">
       {!! Form::label('price_offer',trans('admin.price_offer'), ['class' => 'awesome']) !!} 
       {!! Form::number("price_offer",value($product->price_offer),['class' => 'form-control','step' => '0.01','placeholder' => trans('admin.price_offer')]) !!}

  </div> 

<!--  ---------------------------------------------------------------------------------- -->  
 <div class="form-group col-lg-4 col-md-4 col-sm-6">
       {!! Form::label('start_offer_at',trans('admin.start_offer_at'), ['class' => 'awesome']) !!} 
       {!! Form::date("start_offer_at",value($product->start_offer_at),['class' => 'form-control']) !!}

  </div> 

<!--  ---------------------------------------------------------------------------------- --> 
<div class="form-group col-lg-4 col-md-4 col-sm-6">
       {!! Form::label('end_offer_at',trans('admin.end_offer_at'), ['class' => 'awesome']) !!} 
       {!! Form::date("end_offer_at",value($product->end_offer_at),['class' => 'form-control']) !!}
         @if($errors->has('end_offer_at'))
             <p class="text-danger text-uppercase">{{$errors->first('end_offer_at')}}</p>
         @endif
  </div> 

<!--  ---------------------------------------------------------------------------------- -->
     <div class="form-group col-md-8 col-sm-6">
       {!! Form::label('status',trans('admin.status'), ['class' => 'awesome']) !!} 
       {!! Form::select("status",['pending' => trans('admin.pending'),'refused' => trans('admin.refused'),'active' => trans('admin.active'),],value($product->status),['class' => 'form-control checkStat','placeholder' => "...."]) !!}

    </div> 

<!--  ---------------------------------------------------------------------------------- -->
    <div class="form-group d-none ifRefused col-12">
       {!! Form::label('reason',trans('admin.reason'), ['class' => 'awesome']) !!} 
       {!! Form::textarea("reason",value($product->reason),['class' => 'form-control ckeditor  ']) !!}

    </div> 
<!-- ---------------------------------------------------------------------------------------- -->


</div>




</div>
