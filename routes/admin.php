<?php



Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ 




    
Route::group(['prefix' => 'dashboard','namespace' => "Admin"],function(){

 Config::set("auth.defines","admin");

	Route::group(["middleware" => "checkAdmin:admin"],function(){

		Route::resource("/admin","AdminController");
	


		Route::get("/adminData","AdminController@adminsData")->name('datatables.data');


	      Route::get('/',function(){
	      	 return view("admin.welcome");
	      });

	      Route::any("logout","adminAcount@logout");

	});


  

});




 });



Route::group(['prefix' => 'dashboard','namespace' => "Admin"],function(){


// ===================================================================================
	      Route::get('/login',"adminAcount@login");
	       Route::post('/login',"adminAcount@submitLogin");
	  

	      Route::get("/forgotPassword","adminAcount@forgotPassword");
	      Route::post("/forgotPassword","adminAcount@forgotPasswordSubmit");

	      Route::get("/resetPassword/{token}","adminAcount@resetPassword");
	      Route::post("/resetPassword/{token}","adminAcount@resetPasswordSubmit");

// ===================================================================================

});


