<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
    
    
    public function setting(){


      return view("admin.setting.edit");

    }



  public function setting_submit(){

     // $valiadte = request()->validate([
                      
     //                "name_en" => "testo",
					// "name_ar" => "بم بم",
					// "email" => "ecommerce@com.com",
					// "description" => "test testo tastot",
					// "keyword"  => "tastoto bardo",
					// "maintenance_message" => "this testo in testing",
					// "statu" =>"open",
					// "main_lang" => "ar"

     //            ]);

  	$allRequest = request()->except(['_token','_method']);

  	// return $allRequest;

  	  
  	  setting()->update($allRequest);

  	  session()->flash("success","success to update setting");

  	  return redirect(route('admin.index'));

  }


}
