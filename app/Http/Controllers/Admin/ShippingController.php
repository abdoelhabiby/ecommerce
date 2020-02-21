<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Shipping;
use Illuminate\Http\Request;

use App\DataTables\ShippingDataTable;

class ShippingController extends Controller
{
    
     // --------------------------------------------------------------------------


       public function index(ShippingDataTable $datatable)
       {

  

           return $datatable->render('admin.shipping.index');
       }


    // --------------------------------------------------------------------------

       
       public function create()
       {

           $users = \App\User::where('level','company')->pluck('name','id');
           
           return view('admin.shipping.create',compact('users'));

       }

    // --------------------------------------------------------------------------



       public function store(Request $request)
       {


        $validate = $request->validate([

            "name_en" => "required|string|unique:shippings",
            "name_ar" => "required|string|unique:shippings",
            "user_id" => "required|numeric",
            "address" => "sometimes|nullable|string",
            "lat" => "sometimes|nullable|string",
            "lng" => "sometimes|nullable|string",
            "icon"    => validateImage(),

        ],[],[

          "user_id" => "Company owner"

        ]); 

        if($request->hasFile('icon')){

         $validate['icon'] = Uploade()->upload_file(null,$request->file('icon'),'shipping');
     }


     
     Shipping::create($validate);

     session()->flash('success',trans('admin.succShipping'));

     return redirect(route('shipping.index'));


    }
    // --------------------------------------------------------------------------


        // public function show(Category $category)
        // {
        //     //
        // }
    // --------------------------------------------------------------------------




    public function edit(Shipping $shipping)
    {


      $users = \App\User::where('level','company')->pluck('name','id');

      return view('admin.shipping.edit',compact(['shipping','users']));
    }


    // --------------------------------------------------------------------------

    public function update(Request $request, Shipping $shipping)
    {



        $validate = $request->validate([

            "name_en" => "required|string|unique:shippings,name_en,".$shipping->id."id",
            "name_ar" => "required|string|unique:shippings,name_ar,".$shipping->id."id",
            "user_id" => "required|numeric",
            "address" => "sometimes|nullable|string",
            "lat" => "sometimes|nullable|string",
            "lng" => "sometimes|nullable|string",
            "icon"    => validateImage(),

        ]); 

        if($request->hasFile('icon')){
           
           $previcon = !empty($shipping->icon) ? $shipping->icon : null;

          $validate['icon'] = Uploade()->upload_file($previcon,$request->file('icon'),'shipping');
      }



      $shipping->update($validate);

      session()->flash('success',trans('admin.succShippingUpdat'));

      return redirect(route('shipping.index'));


    }




    // --------------------------------------------------------------------------


    public function destroy(Shipping $shipping)
    {
        
       

       if(!empty($shipping->icon)){

          \Storage::delete($shipping->icon);
      }
      

    $shipping->delete();

    session()->flash('success',trans('admin.succShippingDel'));

    return redirect(route('shipping.index'));




    }
}
