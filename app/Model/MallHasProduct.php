<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MallHasProduct extends Model
{
    
    protected $tabel = 'mall_has_products';
    protected $fillable = [

           "product_id",
           "mall_id",
     ];
     

     public function mall(){

          return $this->belongsTo(\App\Model\Mall::class,'mall_id',"id");
     }


}
