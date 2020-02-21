<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Size;
use Illuminate\Http\Request;

use App\DataTables\SizeDataTable;

class SizeController extends Controller
{
    
    public function index(SizeDataTable $dataTable)
    {
 


        return $dataTable->render('admin.size.index',compact("categories"));




    }

// =========================================================================

        public function create()
        {
            return view('admin.size.create');
        }
    // =========================================================================


        function store(Request $request)
        {


 

            $validate = $request->validate([

                "name_en"  => "required|string|unique:sizes",
                "name_ar"  => "required|string|unique:sizes",
                "category_id"  => "required|numeric",
                "is_public"  => "required|in:yes,no",

            ],[],[

               "name_en" => "field Name en",
               "name_ar" => "field Name ar",
           ]);


            Size::create($validate);

            session()->flash("success",trans('admin.Su_Create'));

            return redirect(route('sizes.index'));



        }
    // =========================================================================


    // public function show(Countries $countries)
    // {
    //     //
    // }

    // =========================================================================

        public function edit($size_id)

        {

          $size = Size::findOrFail($size_id);

          return view('admin.size.edit',compact("size"));

      }

    // =========================================================================

      public function update(Request $request, $size_id)
      {


        $size = Size::findOrFail($size_id);


        $validate = $request->validate([

         "name_en"  => "required|string|unique:sizes,name_en,".$size->id.",id",
         "name_ar"  => "required|string|unique:sizes,name_ar,".$size->id.",id",
         "category_id"  => "required|numeric",
         "is_public"  => "required|in:yes,no",

     ]);



       $size->update($validate);

       session()->flash("success",trans('admin.Su_Update'));

       return redirect(route('sizes.index'));


    }

    // =========================================================================
    public function destroy(Size $size)
    {

         
       $size->delete();

       session()->flash("success",trans('admin.Su_Delete'));

       return redirect(route('sizes.index'));
    }
}
