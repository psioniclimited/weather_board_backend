<?php

namespace App\Modules\WeatherBoardManagement\Controllers;

use App\Http\Controllers\Controller;
use App\Events\TestEvent;
use App\Events\PriceChangeEvent;
use Event;

class BroadcastPriceController extends Controller {

    /**
     * [broadcastTest -test broadcast]
     * @return [type] [description]
     */
    public function broadcastTest(){
    	$my_event = new TestEvent('Broadcasting in Laravel using Pusher!');
	    Event::fire($my_event);

	    return view('welcome');
    }

    /**
     * [broadcastPrice -test another broadcast]
     * @return [type] [description]
     */
    public function broadcastPrice(){
    	$my_event = new PriceChangeEvent('Broadcasting price test!');
	    Event::fire($my_event);

	    return view('welcome');
    }

}
