@push('scripts')


<script type="text/javascript">

$(function(){

var checkcateg = $(".selectCateg option:selected").val();

if(checkcateg != ''){
    $.ajax({
                
                url:"{{route('selectCategory')}}",
                method:"post",
                data:{_token:"{{csrf_token()}}",categId:checkcateg,proId:"{{$product->id}}"},
                success:function(data){
                  
                   $("#aboutShipping").html(data);

                }


              });


         }else{
          var test = `<h3 style="text-align-last: center;">please select category</h3>`;
          $("#aboutShipping").html(test);
}


	$(".selectCateg").change(function(){
        
        var selectCategory = $(".selectCateg option:selected").val();

         if(selectCategory != ''){
              
              $.ajax({
                
                url:"{{route('selectCategory')}}",
                method:"post",
                data:{_token:"{{csrf_token()}}",categId:selectCategory,proId:"{{$product->id}}"},
                success:function(data){
                  
                   $("#aboutShipping").html(data);

                }


              });


         }else{
          var test = `<h3 style="text-align-last: center;">please select category</h3>`;
          $("#aboutShipping").html(test);
         }

	});


});

</script>

@endpush

<div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category-tab">

     <div class="form-group">
       {!! Form::label('category_id',trans('admin.category'), ['class' => 'awesome']) !!} 
       {!! Form::select("category_id",\App\Model\Category::pluck('categ_name_'.langLocal(),'id'),value($product->category_id),['class' => 'form-control selectCateg','placeholder' => "...."]) !!}

    </div> 



</div>
