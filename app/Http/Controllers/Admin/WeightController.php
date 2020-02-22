<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Weight;
use Illuminate\Http\Request;

use App\DataTables\WeightDataTable;


class WeightController extends Controller
{

 public function index(WeightDataTable $dataTable)
    {

        return $dataTable->render('admin.weight.index');




    }

// =========================================================================

        public function create()
        {
            return view('admin.weight.create');
        }
    // =========================================================================


        function store(Request $request)
        {


 

            $validate = $request->validate([

                "name_en"  => "required|string|unique:weights",
                "name_ar"  => "required|string|unique:weights",

            ],[],[

               "name_en" => "field Name en",
               "name_ar" => "field Name ar",
           ]);


            Weight::create($validate);

            session()->flash("success",trans('admin.Su_Create'));

            return redirect(route('weights.index'));



        }
    // =========================================================================


    // public function show(Countries $countries)
    // {
    //     //
    // }

    // =========================================================================

        public function edit($weight_id)

        {

          $weight = Weight::findOrFail($weight_id);

          return view('admin.weight.edit',compact("weight"));

      }

    // =========================================================================

      public function update(Request $request, $weight_id)
      {


        $weight = Weight::findOrFail($weight_id);


        $validate = $request->validate([

         "name_en"  => "required|string|unique:weights,name_en,".$weight->id.",id",
         "name_ar"  => "required|string|unique:weights,name_ar,".$weight->id.",id",


     ]);



       $weight->update($validate);

       session()->flash("success",trans('admin.Su_Update'));

       return redirect(route('weights.index'));


    }

    // =========================================================================
    public function destroy(Weight $weight)
    {

         
       $weight->delete();

       session()->flash("success",trans('admin.Su_Delete'));

       return redirect(route('weights.index'));
    }
}
