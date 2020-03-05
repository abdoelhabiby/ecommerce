 @push('scripts')
 <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">

<style type="text/css">
	.dz-image img{
		width: 100%;
        height: 100%;
			}
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>



<script type="text/javascript">
		Dropzone.autoDiscover = false;
	
	$(function(){

            $("#uploadeImages").dropzone({ 
            	url: "{{route('uploadeImage',$product->id)}}",
            	paramName:'file',
            	uploadMultiple:false,
            	maxFilesize:2,
            	maxFiles:10,
            	acceptedFiles:'image/*',
            	dictDefaultMessage:'{{trans("admin.dropzoneMessage")}}',
            	dictRemoveFile:'{{trans("admin.delete")}}',
            	params:{ _token:'{{csrf_token()}}'},
            	removedfile:function(file){
                   
                   $.ajax({
                      
                      url:"{{route('deleteImage')}}",
                      dataType:'json',
                      method:"post",
                      data:{_token:"{{csrf_token()}}",name:file.name,size:file.size},

                   });

             
                      
          var _ref;
    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

            	},
            	 addRemoveLinks:true,
            	init:function(){
                  @foreach($product->files()->get() as $file)
                     var mocka ={name:"{{$file->name}}",fileId:"{{$file->id}}",size:"{{$file->size}}",type:"{{$file->mimes_type}}"};
                     this.emit("addedfile",mocka);
                     this.options.thumbnail.call(this,mocka,"{{asset('storage/'.$file->full_file)}}");
                  @endforeach

                  $('.dz-progress').remove();

            	},

 


            });


     /*---------------------------------------------------------*/
     




	});
</script>


 @endpush 




  <div class="tab-pane fade " id="media" role="tabpanel" aria-labelledby="media-tab">

  	{!! Form::label('photo',trans('admin.mainPhoto'),['class' => 'awesome'])!!}
    {!! Form::file('photo',['class' => 'form-control mb-3 imgInp'])!!}


    <img src="{{asset('storage/'.$product->photo)}}" class="blah showIm
    " width="250px" height="250px">


 <br><label>{{trans('admin.subPhoto')}}</label>
  	<div class="dropzone mt-2" id="uploadeImages"></div>


  </div>
