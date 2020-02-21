<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Color;
use Illuminate\Http\Request;

use App\DataTables\ColorDataTable;

class ColorController extends Controller
{

    public function index(ColorDataTable $dataTable)
    {

        return $dataTable->render('admin.color.index');




    }

// =========================================================================

        public function create()
        {
            return view('admin.color.create');
        }
    // =========================================================================


        function store(Request $request)
        {


 

            $validate = $request->validate([

                "name_en"  => "required|string|unique:colors",
                "name_ar"  => "required|string|unique:colors",
                "color"  => "required|string",

            ],[],[

               "name_en" => "field Name en",
               "name_ar" => "field Name ar",
           ]);


            Color::create($validate);

            session()->flash("success",trans('admin.Su_Create'));

            return redirect(route('colors.index'));



        }
    // =========================================================================


    // public function show(Countries $countries)
    // {
    //     //
    // }

    // =========================================================================

        public function edit($color_id)

        {

          $color = Color::findOrFail($color_id);

          return view('admin.color.edit',compact("color"));

      }

    // =========================================================================

      public function update(Request $request, $color_id)
      {


        $color = Color::findOrFail($color_id);


        $validate = $request->validate([

         "name_en"  => "required|string|unique:colors,name_en,".$color->id.",id",
         "name_ar"  => "required|string|unique:colors,name_ar,".$color->id.",id",
         "color"  => "required|string",


     ]);



       $color->update($validate);

       session()->flash("success",trans('admin.Su_Update'));

       return redirect(route('colors.index'));


    }

    // =========================================================================
    public function destroy(Color $color)
    {

         
       $color->delete();

       session()->flash("success",trans('admin.Su_Delete'));

       return redirect(route('colors.index'));
    }

}
