@if(langLocal() == 'ar')
<a href="#"   data-id="{!! $id!!}" data-action="states" data-name="{{$state_name_ar}}" class="ButtonDelete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
@else

<a href="#"   data-id="{!! $id!!}" data-action="states" data-name="{{$state_name_en}}" class="ButtonDelete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
@endif