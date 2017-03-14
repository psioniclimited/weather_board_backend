<?php

/*
  |--------------------------------------------------------------------------
  | Weather Board Management Routes
  |--------------------------------------------------------------------------
  |
  | All the routes for Weather Board Management module has been written here
  |
  |
 */

Route::group(['middleware' => ['web']], function () {

	Route::get('/broadcast_test', 'App\Modules\WeatherBoardManagement\Controllers\BroadcastPriceController@broadcastTest');
	Route::get('/broadcast_price', 'App\Modules\WeatherBoardManagement\Controllers\BroadcastPriceController@broadcastPrice');

	// View board data
	Route::get('/boarddata', 'App\Modules\WeatherBoardManagement\Controllers\BoardDataController@boardData');
});