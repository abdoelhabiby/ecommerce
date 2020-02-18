<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    


    protected $tabel= 'states';

    protected $fillable = [

                "state_name_en",
				"state_name_ar",
				"country_id",
				"city_id",
		

          ];


		  public function country(){

		  	  return $this->belongsTo(Countries::class,'country_id');
		  }

		  public function city(){
		  	
		  	return $this->belongsTo(city::class,'city_id');
		  }




}
