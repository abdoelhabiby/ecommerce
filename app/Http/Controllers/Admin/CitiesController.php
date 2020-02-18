<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\city;
use Illuminate\Http\Request;

use App\DataTables\CitiesDatatable;

class CitiesController extends Controller
{
   


    public function index(CitiesDatatable $dataTable)
    {
        
        return $dataTable->render('admin.cities.index');




    }

// =========================================================================
  
    public function create()
    {
        return view('admin.cities.create');
    }
// =========================================================================


  function store(Request $request)
    {
        $validate = $request->validate([

                "city_name_en"  => "required|string|unique:cities",
                "city_name_ar"  => "required|string|unique:cities",
                "country_id"  => "required|integer",

         ],[],[
            
           "name_en" => "field Name en",
           "name_ar" => "field Name ar",
         ]);


       city::create($validate);
   
       session()->flash("success",trans('admin.cityCreate'));

       return redirect(route('cities.index'));



    }
// =========================================================================

 
    // public function show(Countries $countries)
    // {
    //     //
    // }

// =========================================================================

    public function edit($cities)

    {
       
      $city = city::findOrFail($cities);

        return view('admin.cities.edit',compact("city"));

    }

// =========================================================================

    public function update(Request $request, $cities)
    {


             $city = city::findOrFail($cities);

             $validate = $request->validate([

                            "city_name_en"  => "required|string|unique:cities,city_name_en,".$city->id.",id",
                            "city_name_ar"  => "required|string|unique:cities,city_name_ar,".$city->id.",id",
                            "country_id"  => "required|integer",
                     ]);


           $city->update($validate);
       
           session()->flash("success",trans('admin.cityUpdate'));

           return redirect(route('cities.index'));


    }

// =========================================================================
    public function destroy($cities)
    {



       $city = city::findOrFail($cities);

       $city->delete();

       session()->flash("success",trans('admin.cityDelete'));

       return redirect(route('cities.index'));
    }
}
