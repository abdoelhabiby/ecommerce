<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $tabel= 'countries';

    protected $fillable = [

        "name_en",
				"name_ar",
				"code_number",
				"short_name",
				"logo",
				"currency"

          ];
          
   

   public function malls(){
   	return $this->hasMany(\App\Model\Mall::class,'country_id','id');
   }


}
