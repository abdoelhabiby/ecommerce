<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    

    protected $table = 'shippings'; 

    protected $fillable = [
          
            "name_en",
			"name_ar",
			"user_id",
			"address",
			"lat",
			"lng",
			"icon",


    ];

   
   public function user(){

     return $this->belongsTo(\App\User::class);

   }


}
