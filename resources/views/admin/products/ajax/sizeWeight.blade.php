@push('scripts')


  <script type="text/javascript">
    $(function(){

           $(".selectMultiple").select2();

    })
  </script>

 @endpush

 <div class="row">  
     <div class="form-group col-md-6">
       {!! Form::label('size',trans('admin.size'), ['class' => 'awesome']) !!} 
       {!! Form::text("size",value($product->size),['class' => 'form-control']) !!}
         @if($errors->has('size'))
             <p class="text-danger text-uppercase">{{$errors->first('size')}}</p>
         @endif
    </div>    

     <div class="form-group col-md-6">
       {!! Form::label('size_id',trans('admin.size_id'), ['class' => 'awesome']) !!} 
       {!! Form::select("size_id",$sizes,value($product->size_id),['class' => 'form-control','placeholder' => "...."]) !!}
         @if($errors->has('size_id'))
             <p class="text-danger text-uppercase">{{$errors->first('size_id')}}</p>
         @endif
    </div> 

<!-- -------------------------------------------------------------------------------- -->

     <div class="form-group col-md-6">
       {!! Form::label('weight',trans('admin.weight'), ['class' => 'awesome']) !!} 
       {!! Form::text("weight",value($product->weight),['class' => 'form-control']) !!}
         @if($errors->has('weight'))
             <p class="text-danger text-uppercase">{{$errors->first('weight')}}</p>
         @endif
    </div>    

     <div class="form-group col-md-6">
       {!! Form::label('weight_id',trans('admin.weight_id'), ['class' => 'awesome']) !!} 
       {!! Form::select("weight_id",$weights,value($product->weight_id),['class' => 'form-control','placeholder' => "...."]) !!}
         @if($errors->has('weight_id'))
             <p class="text-danger text-uppercase">{{$errors->first('weight_id')}}</p>
         @endif
    </div>

    <div class="form-group col-md-6">
      {!! Form::label('color_id',trans('admin.color'), ['class' => 'awesome']) !!} 
       {!! Form::select("color_id",$colors,value($product->color_id),['class' => 'form-control','placeholder' => "...."]) !!}
         @if($errors->has('color_id'))
             <p class="text-danger text-uppercase">{{$errors->first('color_id')}}</p>
         @endif
    </div> 

    <div class="form-group col-md-6">
      {!! Form::label('trade_id',trans('admin.trademark'), ['class' => 'awesome']) !!} 
       {!! Form::select("trade_id",$trademark,value($product->trade_id),['class' => 'form-control','placeholder' => "...."]) !!}
         @if($errors->has('trade_id'))
             <p class="text-danger text-uppercase">{{$errors->first('trade_id')}}</p>
         @endif
    </div> 

    <div class="form-group col-md-6">
      {!! Form::label('manufactury_id',trans('admin.manufacturers'), ['class' => 'awesome']) !!} 
       {!! Form::select("manufactury_id",$manufacturers,value($product->manufactury_id),['class' => 'form-control','placeholder' => "...."]) !!}
         @if($errors->has('manufactury_id'))
             <p class="text-danger text-uppercase">{{$errors->first('manufactury_id')}}</p>
         @endif
    </div> 

    <div class="form-group col-md-6">
      {!! Form::label('malls',trans('admin.malls'), ['class' => 'awesome']) !!} 


  <select class="form-control selectMultiple" name="mall[]" multiple="multiple">
      	@foreach($countries as $country)
         <optgroup label="{{ $country->{'name_'.langLocal()} }}">
         	@foreach($country->malls()->get() as $mall)
             
         	  <option value="{{$mall->id}}" {{ in_array($mall->id,$mallArray) ? 'selected' :'' }}>{{ $mall->{'name_'.langLocal()} }}</option>

         	@endforeach
         </optgroup>

         @endforeach()
      	
      </select>

    </div> 

</div> 
