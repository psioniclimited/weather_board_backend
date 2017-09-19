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
	// Update price list process
  Route::post('update_price_list_process', 'App\Modules\WeatherBoardManagement\Controllers\BroadcastPriceController@updatePriceListProcess');
  // Update ticker text process
	Route::post('update_ticker_text_process', 'App\Modules\WeatherBoardManagement\Controllers\BroadcastTickerTextController@updateTickerTextProcess');
  // Update video link process
  Route::post('update_video_link_process', 'App\Modules\WeatherBoardManagement\Controllers\BroadcastVideoLinkController@updateVideoLinkProcess');
  // Serve video
  Route::get('/getvideo/{filename}', 'App\Modules\WeatherBoardManagement\Controllers\BroadcastVideoLinkController@serveVideo');
});