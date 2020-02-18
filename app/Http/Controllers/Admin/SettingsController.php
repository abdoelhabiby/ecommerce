<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Settings;

use Storage;

class SettingsController extends Controller
{
    
    
    public function setting(){


      return view("admin.setting.edit");

    }







  public function setting_submit(){

  $validate =   request()->validate([
                    
                     "logo" => validateImage(),                      
                     "icon" => validateImage(),
                     "name_en"  => "required",
                     "name_ar"  => "required",
                     "email"  => "required|email",
                     "description"  => "required|min:10",
                     "keywords"  => "required|min:10",
                     "maintenance_message"  => "required|min:10",
                     "status"  => "required|in:open,close",
                     "main_lang"  => "required",                      

                ]);

  	// $allRequest = request()->except(['_token','_method']);

 // return $validate;

    if(request()->file('logo')){

    $validate['logo'] = Uploade()->upload_file(setting()->logo,request()->file('logo'),'setting');

    }


    if(request()->file('icon')){

     $validate['icon'] = Uploade()->upload_file(setting()->icon,request()->file('icon'),'setting');

    }

  	  
  	  setting()->update($validate);

  	  session()->flash("success","success to update setting");

  	  return redirect(route('setting'));

  }


}
