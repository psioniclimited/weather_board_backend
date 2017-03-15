<?php

namespace App\Modules\WeatherBoardManagement\Controllers;

use App\Http\Controllers\Controller;
use App\Events\TestEvent;
use App\Events\PriceChangeEvent;
use Event;
use Illuminate\Http\Request;
use App\Modules\WeatherBoardManagement\Models\Content;
use Entrust;

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

    /**
     * [updatePriceListProcess -update price list]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updatePriceListProcess(Request $request){
        // Get user id from Entrust
        $user_id = Entrust::user()->id;
        // Get item text in array format
        $item_text = $request->get('item_text');
        // Get item price in array format
        $item_price = $request->get('item_price');
        // Get current price list
        $update_price_list = Content::all();

        foreach ($item_text as $index => $value){
            $update_price_list[$index]->text = $item_text[$index];
            $update_price_list[$index]->price = $item_price[$index];
            $update_price_list[$index]->content_types_id = 1;
            $update_price_list[$index]->users_id = $user_id;

            $update_price_list[$index]->update();
        }

        return back();
    }

}
