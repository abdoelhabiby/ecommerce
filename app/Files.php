<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    




          protected $table = "files";
          protected $fillable = [

                "name",
				"size",
				"file",
				"path",
				"full_file",
				"mimes_type",
				"model_name",
				"relation_id",

          ];
            




}
