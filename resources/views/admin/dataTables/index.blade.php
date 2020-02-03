@extends("admin.layouts.app")

@section('title')
 {{trans('admin.adminPanel')}}
@endsection

<div class="container" style="margin: 0px 20px">
@section("content")

 {!! $dataTable->table(['class' => 'tabel table-hover testTable']) !!}


@endsection
</div>

<!-- Modal -->
<div class="modal fade" id="adminDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Waning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you shore do delet this admin
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




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




	 

});

</script>

@endpush