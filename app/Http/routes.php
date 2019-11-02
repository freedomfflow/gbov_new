<?php

/* Test Routes */
//Route::get('/order', function() {
//	return View::make('order');
//});

Route::group(['middleware' => ['guest']], function() {
	Route::get('/orders/', 'OrdersController@index');
	Route::get('/orders/verifyUser/{email}', 'OrdersController@verifyUser');
	Route::get('/orders/validateFormField/{rule}/{value}/{value2?}', 'OrdersController@validateFormField');
	Route::post('/orders/process', ['as' => 'orders.process', 'uses' => 'OrdersController@processOrder']);
	Route::get('/orders/thankyou', 'OrdersController@thankyou');
	Route::get('/orders/getPrices', 'OrdersController@getPrices');
	Route::get('/orders/test', 'OrdersController@test');
	Route::get('/father_gabriel', function() {
		return view('father_gabriel');
	});
	Route::get('/song', function() {
		redirect('/files/Hail_The_American_Soldier.mp3');
	});
	Route::get('/test_thanks', function() {
		return view('orders.thankyou');
	});
});

/* End Test Routes */

Route::get('/', function () {
    return view('gbov');
});

Route::auth();

Route::get('/home', 'HomeController@index');
