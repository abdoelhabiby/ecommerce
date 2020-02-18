<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Manufacturers extends Model
{
    

   protected $table = 'manufacturers';


   protected $fillable = [

   
		"name_en",
		"name_ar",
		"contact_name",
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




}
