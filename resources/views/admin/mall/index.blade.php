@extends("admin.layouts.app")

@section('title')
 {{trans('admin.malls')}}
@endsection

@section("content")

@if(session()->has("success"))

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> {{session('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


@endif





 {!! $dataTable->table(['class' => 'table table-hover table-bordered dataTable']) !!}



<!-- Modal -->
<div class="modal fade" id="modelDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{trans("admin.messageModel")}} <span> </span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans("admin.close")}}</button>
        <form action="" method="post">
                @csrf()
                @method("delete")

                  <input type="submit" value="{{trans('admin.delete')}}" class="btn btn-danger">
         </form> 


      </div>
    </div>
  </div>
</div>




@endsection





@push('scripts')

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}

<script type="text/javascript">
$(function(){
	 
	 $(".buttons-create").addClass("btn btn-primary").removeClass("dt-button");
	 $(".buttons-export").addClass("btn btn-secondary").removeClass("dt-button");
	 $(".buttons-print").addClass("btn btn-success").removeClass("dt-button");
	 $(".buttons-reset").addClass("btn btn-danger").removeClass("dt-button");
	 $(".buttons-reload").addClass("btn btn-dark").removeClass("dt-button");

	 $(".dt-buttons a").css({"marginRight" : "10px"});
	 $(".dt-buttons").css({"marginBottom" : "10px"});


	 $(".dataTables_filter input").css({"borderRadius" : "5px","outline" : 0});



var lang = "{{langLocal() == 'ar' ? 'ar':'' }}";

if(lang == 'ar'){

var create = `<i class='fa fa-plus'></i>`;
var export_b = `<i class='fa fa-download'></i>`;
var print_b = `<i class='fa fa-print'></i>`;
var reset = `<i class='fa fa-undo'></i>`;
var reload = `<i class='fa fa-refresh'></i>`;

   $(".buttons-create span").html(create + " {{trans('admin.create_btn')}}");
   $(".buttons-export span").html(export_b + " {{trans('admin.export_btn')}}");
   $(".buttons-print span").html(print_b + " {{trans('admin.print_btn')}}");
   $(".buttons-reset span").html(reset + " {{trans('admin.reset_btn')}}");
   $(".buttons-reload span").html(reload + " {{trans('admin.reload_btn')}}");



}

	 

});

</script>

@endpush