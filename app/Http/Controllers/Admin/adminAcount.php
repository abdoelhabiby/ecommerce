<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin;
use Carbon\Carbon;




class adminAcount extends Controller
{
  


 //=====================================================================================================   
   public function login(){
        
       return view("admin.adminAcount.login");


   }



// ==========================================================================================
   public function submitLogin(){

   // return request()->all();

     $remember = request()->remember ? true : false;

   	  if(auth()->guard("admin")->attempt(["email" => request()->email,"password" => request()->password],$remember)){

   	  	return redirect("en/dashboard");
   	  }else{
   	  	session()->flash("error_log","email or passwod not correct");
   	  	return back();

   	  }
   }




// ===========================================================================================
   public function logout(){

   	 auth()->guard("admin")->logout();

   	 return redirect("dashboard/login");
   }




// ========================================================================================

   public function forgotPassword(){

                return view("admin.adminAcount.resetPassword");


   }



// =============================================================================================



   public function forgotPasswordSubmit(){


   	  $admin = Admin::where("email",request()->email)->first();


   	  if(empty($admin)){
 	  	session()->flash("error_log","this email invalid");
   	  	return back();
   	  }else{
   	  	   	 
  	//  $token = app('auth.password.broker')->createToken($admin); { i cant fix eror ): }
   	  	   	  	$token = \Str::random(50);


     $tableReset = \DB::table("password_resets")->insert([
                  
                  "email" => request()->email,
                  "token" => $token,
                  "created_at" => Carbon::now()

              ]);


   	  	  
    \Mail::to("a@a.com")->send(new \App\Mail\admin\resetPassword(["admin" => $admin,"token" => $token]));


    	session()->flash("success","We have e-mailed your password reset link!");
   	  	return back();


   	  }

  
   }


// ==========================================================================================

  public function resetPassword($token = null){

  	  $checkToken = \DB::table("password_resets")->where("token",$token)->where("created_at",">",Carbon::now()->subHours(2))->first();

  	  if(!empty($checkToken)){

  	  	 return view("admin.adminAcount.reset_new_pass",compact("checkToken"));
         

  	  }else{

  	  	return redirect("dashboard/forgotPassword");

  	  }
  }




// ==========================================================================================

  public function resetPasswordSubmit($token){
  
        $checkToken = \DB::table("password_resets")->where("token",$token)
                                          ->where("created_at",">",Carbon::now()->subHours(2))->first();  

    if(!empty($checkToken)){
    	
    	$validate = request()->validate([

                                "password" => "required|confirmed",
                                "password_confirmation" => "required"

    	                   ]);

    	$admin = Admin::where("email",$checkToken->email)->update([
                                                           
                                                           "password" => bcrypt(request()->password)
    	                                             ]);

    	  \DB::table("password_resets")->where("email",$checkToken->email)->delete();

    	if(auth()->guard("admin")->attempt(["email" => request()->email,"password" => request()->password])){

    		    		return redirect("dashboard");

    	}

    		return redirect("dashboard/login");
    	
    }else{
    	  	  	return redirect("dashboard/forgotPassword");

    }

  }



// ==========================================================================================
// ==========================================================================================
}
