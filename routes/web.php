<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




  \Config::set('app.locale',setting()->main_lang);

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ 


 
  Route::group(['middleware' => 'maintenance'],function(){


		Route::get("/",function(){

		  return view("style.welcome");

		})->name('welcome');

   });


   // ====================================================================

  
  	Route::get('maintenance',function(){

  		if(setting()->status == 'open'){
  			return redirect(route('welcome'));
  		}

       return setting()->maintenance_message;

  	})->name('maintenance');	


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
