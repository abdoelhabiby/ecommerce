<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $tabel= 'cities';

    protected $fillable = [

                "city_name_en",
				"city_name_ar",
				"country_id",
		

          ];


  public function country(){

  	  return $this->belongsTo(Countries::class,'country_id');
  }


   }
