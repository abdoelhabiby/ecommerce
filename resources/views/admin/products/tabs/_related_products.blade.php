@push('scripts')

<script type="text/javascript">
	$(function(){

     $("#relatedProducts").click(function(){
         var product_title = $(".productValue").val();
         
         if(product_title != ''){
           
           $.ajax({
              
              url:"{{route('relatedProduct')}}",
              method:"post",
              type:'json',
              data:{_token:"{{csrf_token()}}",product:product_title,product_id:"{{$product->id}}"},
              beforeSend:function(){
              	$(".loadding").removeClass('d-none');

              },
              success:function(data){

              	if(data.count > 0){

                   var listes = '';
                   var count = '<br><h5>{{trans("admin.productCount")}} '+ data.count +'</h5>';

                   $.each(data.products,function(key,value){
                      listes+= `<li><label><input type="checkbox" name="related_id[]" value="${value.id}"> ${value.title}</label></li>`;
                   });

                 	$(".loadding").addClass('d-none');

                    $(".appendHtml").removeClass('d-none');
                    $(".appendHtml .allList").html(listes); 

                    $(".appendCount").removeClass('d-none');
                    $(".appendCount").html(count);
                }else{
                     
                     $(".loadding").addClass('d-none');

                     var count_empty = '<br><h5>{{trans("admin.productCount")}} 0 </h5><hr>';

                    $(".appendCount").removeClass('d-none');
                    $(".appendCount").html(count_empty);

                }
              },
              error:function(data){
                  
                  console.log(data);
              }

           });

     

     	}
     });

	});
</script>


@endpush



<div class="tab-pane fade" id="related_products" role="tabpanel" aria-labelledby="setting-tab">

	  <div class="input-group col-md-6">
	    <input type="search" name='product' class="form-control bg-light border-0 small productValue" placeholder="{{trans('admin.srearch_rel_product')}}"  value="" aria-label="Search" aria-describedby="basic-addon2">
	    <div class="input-group-append">
	      <button class="btn btn-primary" type="button" id="relatedProducts">
	      	<i class="fas fa-sync fa-spin loadding d-none"></i> 
	        <i class="fas fa-search fa-sm"></i> 
	      </button>
	    </div>
	  </div>

@if(!empty($product->related))
	  <div class="mt-3">
        <ul>
			 @foreach($product->related as $related)	
			  	<li>
			  		<label>
			  			<input type="checkbox" name="related_id[]" checked value="{{$related->products->id}}"> 
			  		{{$related->products->title}}
			  		</label>
			  		
			  	</li>
			  		
			  	
		    @endforeach
	    </ul>
	    <hr>
	  </div>

@endif()


	  <div class="appendCount d-none ">
	  </div>

	  <div class="appendHtml d-none ">
	  	<ul class="allList">
	  		
	  	</ul>

	  	
	  </div>

</div>