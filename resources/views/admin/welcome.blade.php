@extends("admin.layouts.app")

@section("title")
{{trans('admin.dashboard')}}
@endsection

@section("content")

<div class="container">
 <h1>test Hala Madrid</h1>

 {!! auth()->guard('admin')->user()->name !!}

</div>


@endsection