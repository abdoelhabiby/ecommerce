@extends("admin.layouts.app")

@section('title')
 {{trans('admin.colors')}}
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



@endpush