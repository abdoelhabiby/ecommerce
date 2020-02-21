<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
   protected $table = 'malls';


   protected $fillable = [

   
		"name_en",
		"name_ar",
		"contact_name",
		"country_id",
		"address",
		"mobile",
		"email",
		"facebook",
		"twitter",
		"website",
		"lat",
		"lng",
		"icon",

   ];


   public function country(){
   	return $this->belongsto(\App\Countries::class);
   }

}
