<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    

 protected $table ='sizes';   
 
 protected $fillable =[
       
        "name_en",
		"name_ar",
		"category_id",
		"is_public",

   ];


   public function category(){

   	 return $this->belongsTo(\App\Model\Category::class,'category_id');
   }

}
