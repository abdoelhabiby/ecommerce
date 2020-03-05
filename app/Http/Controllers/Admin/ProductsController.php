<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Products;
use App\Model\Size;
use App\Model\Weight;
use App\Model\Color;
use App\Model\Trademark;
use App\Model\Manufacturers;
use App\Countries;
use Illuminate\Http\Request;

use App\DataTables\ProductsDataTable;

class ProductsController extends Controller
{

    public function index(ProductsDataTable $dataTable)
    {

        return $dataTable->render('admin.products.index');




    }

// =========================================================================

        public function create()
        {
           $product = Products::create();

           $product_id = $product->id;

            return redirect(route('products.edit',$product_id));
        }

  // =========================================================================

        public function copyProduct($proid)
        {

          if(request()->ajax()){

             $copyProduct = Products::find($proid)->toArray();

             unset($copyProduct['id']);
             unset($copyProduct['photo']);


             if(!empty($copyProduct)){

              $copyMalls = \App\Model\MallHasProduct::where("product_id",$proid)->get();

               $product = Products::create($copyProduct);


               if(!empty($copyMalls)){

                foreach ($copyMalls as $value) {

                   \App\Model\MallHasProduct::create(['product_id' =>  $product->id,
                    'mall_id' => $value->mall_id]);
                }
               }


            

       return response(['status' => true,"id" => $product->id,'success' => trans('admin.successCopy')]);

           }else{

            return response(['status' => false,"message" =>"not found"]);

           }

          }else{
            return redirect(route('products.index'));
          }
        }
    // =========================================================================

       public function selectCategory(){

        if(request()->ajax() && request()->categId && request()->proId){

          $product = Products::find(request()->proId);

          $category_id = request()->categId;

         $categoryId = explode(',',mainParent($category_id));



         // $categoryId = array_diff(explode(',',mainParent($category_id)),[$category_id]);

         //  $sizes_1 = Size::whereIn('category_id',$categoryId)->pluck('name_'.langLocal(),'id');
         //  $sizes_2 = Size::where('is_public',"yes")->pluck('name_'.langLocal(),'id');
         // // $sizes = array_merge(json_decode($sizes_1,true),json_decode($sizes_2,true));

           $sizes = Size::whereIn('category_id',$categoryId)
                        ->pluck('name_'.langLocal(),'id');

                         

         
          $weights = Weight::pluck('name_'.langLocal(),'id');
          $colors = Color::pluck('name_'.langLocal(),'id');
          $trademark = Trademark::pluck('name_'.langLocal(),'id');

          $manufacturers = Manufacturers::pluck('name_'.langLocal(),'id');

          $countries = Countries::all();

          $mall = \App\Model\MallHasProduct::where('product_id',$product->id)->get();

          $mallArray = [];

          if(!empty($mall)){

                  foreach ($mall as $value) {
                    
                     array_push($mallArray, $value->mall_id);
                  }
          }


          $sizeWeight = view('admin.products.ajax.sizeWeight',compact(['sizes','weights','product','colors','trademark','manufacturers','countries','mallArray']))->render();

          return $sizeWeight;

         }
       }


    // =========================================================================


    // public function show(Countries $countries)
    // {
    //     //
    // }

    // =========================================================================

       public function ImUpload($pid){

        if(request()->hasFile('file')){
        
          $nameStore = Uploade()->uploadeFiles(request()->file('file'),"products",$pid,"products/".$pid);

          return $nameStore;


       } 
     }

    // ========================================================================= 

     public function deleteImage(){
          
      
         if(request()->name && request()->size){

           $file = \App\Files::where("name",request()->name)->where("size",request()->size)->first();
           
          if(!empty($file)){ \Storage::delete($file->full_file);

           $file->delete();

           return response(['status' => true]);

          }
              return response(['status' => false,"message" =>"not found"]);


         }

          return response(['status' => false,"message" =>"not found"]);

     }


     // --------------------------------------------------------------------------------

        public function edit(Products $product)

        {


           return view('admin.products.product',compact(['product']));

        }

    // =========================================================================



      public function update(Request $request, Products $product)
      {

        

        $products = Products::findOrFail($product->id);

        $validate = $request->validate([

         "title"  => "required|string",
         "photo"  => "sometimes|nullable|".validateImage(),
         "content" => "required|string|min:30",
         "stock" => "required|numeric",
         "price" => "required|numeric",
         "price_offer" => "sometimes|nullable|numeric",
         "start_at" => "required|date",
         "end_at" => "required|date",
         "start_offer_at" => "sometimes|nullable|date",
         "end_offer_at" => "sometimes|nullable|date",
         "category_id" => "required|numeric",
         "weight" => "sometimes|nullable|numeric",
         "weight_id" => "sometimes|nullable|numeric",
         "manufactury_id" => "required|numeric",
         "trade_id" => "required|numeric",
         "size" => "sometimes|nullable|numeric",
         "size_id" => "sometimes|nullable|numeric",
         "color_id" => "sometimes|nullable|numeric",
         "currency_id" => "sometimes|nullable|numeric",
         "other_data" => "sometimes|nullable|string",
         "status" => "sometimes|nullable|in:pending,refused,active",
         "reason" => "sometimes|nullable|string",
         "mall" => "sometimes|nullable|array",



     ]);


    if(request()->has('mall')){  

      \App\Model\MallHasProduct::where('product_id',$product->id)->delete();

        foreach (request()->mall as $value) {

                \App\Model\MallHasProduct::create(['product_id'=>$product->id ,'mall_id' => $value]);

        }

    }




if(request()->has('photo')){

        if($products->photo != 'products/default.jpg'){
          $prev_photo = $products->photo;
        }else{
          $prev_photo = null;

        }
      $validate['photo'] = Uploade()->upload_file($prev_photo,request()->photo,"products/".$products->id);

}



       $products->update($validate);

       session()->flash("success",trans('admin.Su_Update'));

       return redirect(route('products.index'));


    }

    // =========================================================================
    public function destroy($product)
    {


       $product_id = Products::findOrFail($product);

       \Storage::deleteDirectory('products/'.$product_id->id);
   
         
       $product_id->delete();

       session()->flash("success",trans('admin.Su_Delete'));

       return redirect(route('products.index'));
    }

}
