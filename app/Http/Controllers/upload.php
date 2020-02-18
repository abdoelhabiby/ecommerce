<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class upload extends Controller
{
    

/*

1 - [setting()->logo] check if not empty to delete
2 - request()->file('logo') get name file to store as
3 - get name of folder to add new file



*/


   
   public  function upload_file($prev_logog,$file_request,$folder_name){


   	if(!empty($prev_logog)){

   		         \Storage::delete($prev_logog);
   	}

      $tmp = microtime(true * -5);

      $img_name = $tmp . "_" . $file_request->getClientOriginalName();

      return $file_request->storeAs($folder_name,$img_name);


   }



}
