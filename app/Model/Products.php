<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    
   protected $table = 'products'; 

   protected $fillable = [

          			"title",
          			"photo",
          			"content",
          			"stock",
          			"price",
          			"price_offer",
          			"start_at",
          			"end_at",
          			"start_offer_at",
          			"end_offer_at",
          			"category_id",
          			"weight",
          			"weight_id",
          			"manufactury_id",
          			"trade_id",
          			"size",
                "size_id",
          			"color_id",
          			"currency_id",
          			"other_data",
                "status",
                "reason",



     ];


     public function related(){

          return $this->hasMany(\App\Model\ModelRelatedProduct::class,'product_id','id');
     }      

      public function mallHasProduct(){

          return $this->hasMany(\App\Model\MallHasProduct::class,'product_id','id');
     }  

     public function files(){

          return $this->hasMany(\App\Files::class,'relation_id','id')->where('model_name','products');
     }  


    public function category(){

          return $this->belongsTo(\App\Model\Category::class);
     }



  



}
