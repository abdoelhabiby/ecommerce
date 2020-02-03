@extends("admin.layouts.app")

@section('title')
 {{trans('admin.adminPanel')}}
@endsection

@section("content")

<div class="container">

	<table class="table" id="myTable">
		 <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
		
	</table>

</div>


@push('scripts')
<script>
$(function() {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
});
</script>
@endpush

@endsection