<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Mall;
use Illuminate\Http\Request;

use App\DataTables\mallDataTable;

class MallController extends Controller
{
    
         public function index(mallDataTable $dataTable)
            {

                return $dataTable->render('admin.mall.index');




            }

        // =========================================================================

            public function create()
            {
               $countries = \App\Countries::pluck('name_'.langLocal(),'id');

                return view('admin.mall.create',compact('countries'));
            }
        // =========================================================================






            function store(Request $request)
            {
                $validate = $request->validate([

                    "name_en"  => "required|string|unique:malls",
                    "name_ar"  => "required|string|unique:malls",
                    "contact_name"  => "required|string|unique:malls",
                    "country_id" => "required|numeric",
                    "address" => "required|string",
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

                    $validate['icon'] = Uploade()->upload_file(null,$request->file('icon'),'mall');
                }


                Mall::create($validate);

                session()->flash("success",trans('admin.mallCreate'));

                return redirect(route('malls.index'));



            }
        // =========================================================================


            // public function show(Countries $countries)
            // {
            //     //
            // }

        // =========================================================================

            public function edit($mall_id)

            {

              $countries = \App\Countries::pluck('name_'.langLocal(),'id');

              $mall = Mall::findOrFail($mall_id);

              return view('admin.mall.edit',compact(["mall",'countries']));

          }

        // =========================================================================

          public function update(Request $request, $mall_id)
          {


             $mall = Mall::findOrFail($mall_id);


             $validate = $request->validate([

                "name_en"  => "required|string|unique:malls,name_en,".$mall->id.",id",
                "name_ar"  => "required|string|unique:malls,name_ar,".$mall->id.",id",
                "contact_name"  => "required|string|unique:manufacturers,contact_name,".$mall->id.",id",
                "country_id" => "required|numeric",
                "address" => "required|string",
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

               if(!empty($mall->icon)){

                   \Storage::delete($mall->icon);
               }

               $validate['icon'] = Uploade()->upload_file(null,$request->file('icon'),'mall');
           }


           $mall->update($validate);

           session()->flash("success",trans('admin.mallUpdate'));

           return redirect(route('malls.index'));


        }

        // =========================================================================
        public function destroy($mall_id)
        {



           $mall = Mall::findOrFail($mall_id);
           if(!empty($mall->icon)){

               \Storage::delete($mall->icon);
           }


           $mall->delete();

           session()->flash("success",trans('admin.mallDelete'));

           return redirect(route('malls.index'));
        }
}
