<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;



class CategoryController extends Controller
{


// --------------------------------------------------------------------------


   public function index()
   {


       $categ = Category::with('parent')->when(request()->category,function($query){
        
        return $query->where("categ_name_en",'like','%'.request()->category.'%')
        ->orWhere("categ_name_ar",'like','%'.request()->category.'%');

    })->latest()->paginate(9);

       return view('admin.categories.index',compact('categ'));
   }


// --------------------------------------------------------------------------

   
   public function create()
   {

       $categ = Category::pluck('categ_name_'.langLocal(),'id');

       
       return view('admin.categories.create',compact('categ'));

   }

// --------------------------------------------------------------------------



   public function store(Request $request)
   {

    $validate = $request->validate([

        "categ_name_en" => "required|string|unique:categories",
        "categ_name_ar" => "required|string|unique:categories",
        "parent_id" => "sometimes|nullable|numeric",
        "description" => "sometimes|nullable|string",
        "keywords" => "sometimes|nullable|string",
        "logo"    => validateImage(),

    ]); 

    if($request->hasFile('logo')){

     $validate['logo'] = Uploade()->upload_file(null,$request->file('logo'),'categories');
 }

 
 Category::create($validate);

 session()->flash('success',trans('admin.succCategory'));

 return redirect(route('categories.index'));


}
// --------------------------------------------------------------------------


    // public function show(Category $category)
    // {
    //     //
    // }
// --------------------------------------------------------------------------




public function edit(Category $category)
{

  $categ = Category::pluck('categ_name_'.langLocal(),'id');

  return view('admin.categories.edit',compact(['categ','category']));
}


// --------------------------------------------------------------------------

public function update(Request $request, Category $category)
{

    $validate = $request->validate([

        "categ_name_en" => "required|string|unique:categories,categ_name_en,".$category->id."id",
        "categ_name_ar" => "required|string|unique:categories,categ_name_ar,".$category->id."id",
        "parent_id" => "sometimes|nullable|numeric",
        "description" => "sometimes|nullable|string",
        "keywords" => "sometimes|nullable|string",
        "logo"    => validateImage(),

    ]); 

    if($request->hasFile('logo')){
      
       if(!empty($category->logo)){

          \Storage::delete($category->logo);
      }
      
      $validate['logo'] = Uploade()->upload_file(null,$request->file('logo'),'categories');
  }



  $category->update($validate);

  session()->flash('success',trans('admin.succCategoryUpdat'));

  return redirect(route('categories.index'));


}

// --------------------------------------------------------------------------


public function destroy(Category $category)
{
    
   

   if(!empty($category->logo)){

      \Storage::delete($category->logo);
  }
  

  $deleteCat = $category->Subcategories()->get();

  

  if($deleteCat != null){

    foreach($deleteCat as $deletelogo){
        if(!empty($deletelogo->logo)){
            \Storage::delete($deletelogo->logo);
        }
    }

}

$category->delete();

session()->flash('success',trans('admin.succCategoryDel'));

return redirect(route('categories.index'));




}
}
