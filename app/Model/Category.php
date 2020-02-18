<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='categories';

    protected $fillable = [
        "categ_name_en",
		"categ_name_ar",
		"description",
		"keywords",
		"logo",
		"parent_id",


    ];

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }

 public function Subcategories(){
        return $this->hasMany(Category::class,'parent_id');
    }


   




}
