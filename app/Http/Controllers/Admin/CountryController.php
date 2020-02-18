<?php

namespace App\Http\Controllers\Admin;

use App\Countries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\DataTables\CountriesDataTable;

use Yajra\Datatables\Datatables;



class CountryController extends Controller
{




    public function index(CountriesDataTable $dataTable)
    {
        
        return $dataTable->render('admin.countries.index');


    }

// =========================================================================
  
    public function create()
    {
        return view('admin.countries.create');
    }
// =========================================================================


  function store(Request $request)
    {
        $validate = $request->validate([

                "name_en"  => "required|string|unique:countries",
                "name_ar"  => "required|string|unique:countries",
                "code_number"  => "required|string",
                "short_name"  => "required|string",
                "logo"  => validateImage(),
         ],[],[
            
           "name_en" => "field Name en",
           "name_ar" => "field Name ar",
         ]);

           if($request->hasFile('logo')){

              $validate['logo'] = Uploade()->upload_file(null,$request->file('logo'),'countries');
           }

       Countries::create($validate);
   
       session()->flash("success",trans('admin.countryDelete'));

       return redirect(route('countries.index'));


    }
// =========================================================================

 
    // public function show(Countries $countries)
    // {
    //     //
    // }

// =========================================================================

    public function edit($countries)

    {
       
      $country = Countries::findOrFail($countries);

        return view('admin.countries.edit',compact("country"));

    }

// =========================================================================

    public function update(Request $request, $countries)
    {


             $country = Countries::findOrFail($countries);

             $validate = $request->validate([

                            "name_en"  => "required|string|unique:countries,name_en,".$country->id.",id",
                            "name_ar"  => "required|string|unique:countries,name_ar,".$country->id.",id",
                            "code_number"  => "required|string",
                            "short_name"  => "required|string",
                            "logo"  => validateImage(),
                     ]);

               if($request->hasFile('logo')){

                  $image_prev = !empty($country->logo) ? $country->logo : null;

                  $validate['logo'] = Uploade()->upload_file($image_prev,$request->file('logo'),'countries');
               }

           $country->update($validate);
       
           session()->flash("success",trans('admin.countryUpdate'));

           return redirect(route('countries.index'));


    }

// =========================================================================
    public function destroy($countries)
    {
       $country = Countries::findOrFail($countries);


            if (!empty($country->logo)) {
                \Storage::delete($country->logo);
            }

       $country->delete();

       session()->flash("success",trans('admin.countryDelete'));

       return redirect(route('countries.index'));
    }
}
