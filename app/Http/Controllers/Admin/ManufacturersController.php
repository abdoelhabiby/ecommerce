<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Manufacturers;
use Illuminate\Http\Request;

use App\DataTables\maunfacturersDataTable;

class ManufacturersController extends Controller
{

    public function index(maunfacturersDataTable $dataTable)
    {

        return $dataTable->render('admin.manufacturers.index');




    }

// =========================================================================

    public function create()
    {
        return view('admin.manufacturers.create');
    }
// =========================================================================






    function store(Request $request)
    {
        $validate = $request->validate([

            "name_en"  => "required|string|unique:manufacturers",
            "name_ar"  => "required|string|unique:manufacturers",
            "contact_name"  => "required|string|unique:manufacturers",
            "address" => "sometimes|nullable|string",
            "facebook" => "sometimes|nullable|string",
            "twitter" => "sometimes|nullable|string",
            "website" => "sometimes|nullable|string",
            "mobile" => "sometimes|nullable|string",
            "email" => "sometimes|nullable|string",
            "lat" => "sometimes|nullable|string",
            "lng" => "sometimes|nullable|string",
            "icon" => "sometimes|nullable|" .  validateImage(),

        ],[],[

           "name_en" => "field Name en",
           "name_ar" => "field Name ar",
       ]);

        if($request->hasFile('icon')){

            $validate['icon'] = Uploade()->upload_file(null,$request->file('icon'),'manufacturers');
        }


        Manufacturers::create($validate);

        session()->flash("success",trans('admin.tradeCreate'));

        return redirect(route('manufacturers.index'));



    }
// =========================================================================


    // public function show(Countries $countries)
    // {
    //     //
    // }

// =========================================================================

    public function edit($trademark)

    {

      $trade = Manufacturers::findOrFail($trademark);

      return view('admin.manufacturers.edit',compact("trade"));

  }

// =========================================================================

  public function update(Request $request, $manufact)
  {


     $manufacturers = Manufacturers::findOrFail($manufact);


     $validate = $request->validate([

        "name_en"  => "required|string|unique:manufacturers,name_en,".$manufacturers->id.",id",
        "name_ar"  => "required|string|unique:manufacturers,name_ar,".$manufacturers->id.",id",
        "contact_name"  => "required|string|unique:manufacturers,contact_name,".$manufacturers->id.",id",
        "address" => "sometimes|nullable|string",
        "facebook" => "sometimes|nullable|string",
        "twitter" => "sometimes|nullable|string",
        "website" => "sometimes|nullable|string",
        "mobile" => "sometimes|nullable|string",
        "email" => "sometimes|nullable|string",
        "lat" => "sometimes|nullable|string",
        "lng" => "sometimes|nullable|string",
        "icon" => "sometimes|nullable|" . validateImage()


    ]);


     if($request->hasFile('icon')){

       if(!empty($manufacturers->icon)){

           \Storage::delete($manufacturers->icon);
       }

       $validate['icon'] = Uploade()->upload_file(null,$request->file('icon'),'trademark');
   }


   $manufacturers->update($validate);

   session()->flash("success",trans('admin.tradeUpdate'));

   return redirect(route('manufacturers.index'));


}

// =========================================================================
public function destroy($manufact)
{



   $manufacturers = Manufacturers::findOrFail($manufact);
   if(!empty($manufacturers->logo)){

       \Storage::delete($manufacturers->logo);
   }


   $manufacturers->delete();

   session()->flash("success",trans('admin.tradeDelete'));

   return redirect(route('manufacturers.index'));
}
}
