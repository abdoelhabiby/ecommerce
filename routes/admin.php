<?php



Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
	], function(){ 





		Route::group(['prefix' => 'dashboard','namespace' => "Admin"],function(){

			Config::set("auth.defines","admin");

			Route::group(["middleware" => "checkAdmin:admin"],function(){

// ==========================================================================================


				Route::resource("/admin","AdminController")->except('show');
				Route::get("/adminData","AdminController@adminsData")->name('datatables.data');

	// ==========================================================================================

				Route::get("setting","SettingsController@setting")->name('setting');
				Route::PUT("setting","SettingsController@setting_submit")->name("setingPo");

				Route::resource("categories","CategoryController")->except('show');

				Route::resource("trademark","TrademarkController")->except('show');

				Route::resource("manufacturers","ManufacturersController")->except('show');

				Route::resource("shipping","ShippingController")->except('show');

				Route::resource("malls","MallController")->except('show');

				Route::resource("colors","ColorController")->except('show');

				Route::resource("sizes","SizeController")->except('show');

				Route::resource("weights","WeightController")->except('show');

				Route::resource("products","ProductsController")->except('show');

				Route::post("images/upload/{pid}","ProductsController@ImUpload")->name('uploadeImage');
				Route::post("images/main/{pid}","ProductsController@mainPhoto")->name('mainPhoto');
				Route::post("copy/product/{pid}","ProductsController@copyProduct")->name('copyProduct');
				Route::post("images/delete","ProductsController@deleteImage")->name('deleteImage');
				Route::post("images/maindelete","ProductsController@mainDelete")->name('mainDelete');

				Route::post("select_category","ProductsController@selectCategory")->name('selectCategory');



	// ==========================================================================================

				Route::resource("/countries","CountryController")->except('show');

				Route::resource("/cities","CitiesController")->except('show');

				Route::resource("/states","StatesController")->except('show'); 
				Route::get("/states/city","StatesController@statesCity")->name('states.city'); 




	// ==========================================================================================
	// ==========================================================================================


				Route::resource("/users","userController")->except('show');
				Route::get("/userData","userController@usersData")->name('udatatables.data');

	// =================================================================================

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


