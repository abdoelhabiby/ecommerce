     <div class="form-group">
       {!! Form::label('city_id',trans("admin.city_id"), ['class' => 'awesome']) !!} 
     
    {!! Form::select('city_id',\App\city::where('country_id',$country_id)->pluck('city_name_'.langLocal(),'id'),$selectOld, 
            ['class' => 'form-control' ,'placeholder' => '.....']) !!}
         @if($errors->has('city_id'))
             <p class="text-danger text-uppercase">{{$errors->first('city_id')}}</p>
         @endif
    </div> 