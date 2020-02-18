<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Trademark;
use Illuminate\Http\Request;

use App\DataTables\TrademarkDataTable;

class TrademarkController extends Controller
{


    public function index(TrademarkDataTable $dataTable)
    {

        return $dataTable->render('admin.trademark.index');




    }

// =========================================================================

    public function create()
    {
        return view('admin.trademark.create');
    }
// =========================================================================


    function store(Request $request)
    {
        $validate = $request->validate([

            "name_en"  => "required|string|unique:trademarks",
            "name_ar"  => "required|string|unique:trademarks",
            "logo" => "sometimes|nullable|" .  validateImage(),

        ],[],[

         "name_en" => "field Name en",
         "name_ar" => "field Name ar",
     ]);

        if($request->hasFile('logo')){

            $validate['logo'] = Uploade()->upload_file(null,$request->file('logo'),'trademark');
        }


        Trademark::create($validate);

        session()->flash("success",trans('admin.tradeCreate'));

        return redirect(route('trademark.index'));



    }
// =========================================================================


    // public function show(Countries $countries)
    // {
    //     //
    // }

// =========================================================================

    public function edit($trademark)

    {

      $trade = Trademark::findOrFail($trademark);

      return view('admin.trademark.edit',compact("trade"));

  }

// =========================================================================

  public function update(Request $request, $trademark)
  {


   $trade = Trademark::findOrFail($trademark);


   $validate = $request->validate([

       "name_en"  => "required|string|unique:trademarks,name_en,".$trade->id.",id",
       "name_ar"  => "required|string|unique:trademarks,name_ar,".$trade->id.",id",
       "logo" => "sometimes|nullable|" . validateImage()


   ]);


   if($request->hasFile('logo')){

     if(!empty($trade->logo)){

         \Storage::delete($trade->logo);
     }

     $validate['logo'] = Uploade()->upload_file(null,$request->file('logo'),'trademark');
 }


 $trade->update($validate);

 session()->flash("success",trans('admin.tradeUpdate'));

 return redirect(route('trademark.index'));


}

// =========================================================================
public function destroy($trademark)
{



 $trade = Trademark::findOrFail($trademark);
 if(!empty($trade->logo)){

     \Storage::delete($trade->logo);
 }


 $trade->delete();

 session()->flash("success",trans('admin.tradeDelete'));

 return redirect(route('trademark.index'));
}

}
