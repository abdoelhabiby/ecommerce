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



 public function uploadeFiles($fileRequest,$modelName,$relationId,$folder_name){
   
   if($fileRequest){

     $name = $fileRequest->getClientOriginalName();
     $hashName = $fileRequest->hashName();
     $size = $fileRequest->getSize();
     $mime = $fileRequest->getMimeType();

     \App\Files::create([
        
        "name" => $name,
        "size" => $size,
        "file" => $hashName,
        "path" => $folder_name,
        "full_file" => $folder_name . "/" . $hashName,
        "mimes_type" => $mime,
        "model_name" => $modelName,
        "relation_id" => $relationId,


     ]);

      $fileRequest->storeAs($folder_name,$hashName);

      return response(['status' => true]);

      

   }
    


 }



}
