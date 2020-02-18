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

          ];
          
}
