<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ModelRelatedProduct extends Model
{

	    protected $tabel = 'model_related_products';
        protected $fillable =[

        'product_id',
		'related_id',
    ];


        public function products(){

          return $this->belongsTo(\App\Model\Products::class,'related_id','id');
     }

}
