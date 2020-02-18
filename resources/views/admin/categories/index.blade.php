@extends("admin.layouts.app")

@section('title')
{{trans('admin.categories')}}
@endsection


@section('search')

<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
  <div class="input-group">
    <input type="search" name='category' class="form-control bg-light border-0 small" placeholder="{{trans('admin.searchCateg')}}"  value="{{request()->category}}" aria-label="Search" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit button">
        <i class="fas fa-search fa-sm"></i>
      </button>
    </div>
  </div>
</form>



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


<div class="card">

  <div class="card-header">
    <div class="float-left"><h4> {{trans('admin.categories')}} </h4></div>

    <div class="float-right"> <a href="{{route('categories.create')}}" class="btn btn-primary">{{trans('admin.createCateg')}}</a> </div>
    <div class="clearfix"></div>


  </div>
  <div class="card-body">

    @if($categ->count() > 0)


    <table class=" table table-bordered">

      <thead class="thead-dark">
        <tr>
          <th>#</th>
          <th>{{trans('admin.name_en')}}</th>
          <th>{{trans('admin.name_ar')}}</th>
          <th>{{trans('admin.parent')}}</th>
          <th>{{trans('admin.createAt')}}</th>
          <th style="width: 30px !important ;">{{trans('admin.Edit')}}</th>
          <th style="width: 30px !important ;">{{trans('admin.delete')}}</th>
        </tr>
      </thead>

      <tbody>

        @foreach($categ as $category)

        <tr>
         <td>{!! $category->id !!}</td>
         <td>{!! $category->categ_name_en !!}</td>
         <td>{!! $category->categ_name_ar !!}</td>
         <td>{!! $category->parent == null ? '' : $category->parent->categ_name_en  !!}</td>
         <td>{!! $category->created_at !!}</td>

         <td >
           <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info">
            <i class="fa fa-sm fa-edit"></i>
          </a>
        </td>  

        <td >
         <a href="#" data-action="categories"  data-id="{!! $category->id !!}" class="ButtonDelete btn btn-danger"><i class=" fa fa-sm fa-trash "></i></a>
       </td>

     </tr>


     @endforeach            
   </tbody>




 </table>

 <div class="d-flex justify-content-center mt-5">

  {{ $categ->appends(request()->query())->links() }}

</div>



@else

<h4 class="text-center" style="text-align-last: center;"> Sorry No found Any Recorde !!</h4>


@endif

</div>
</div>





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
        {{trans("admin.modMessCateg")}}
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





