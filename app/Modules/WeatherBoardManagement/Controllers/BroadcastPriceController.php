<?php

namespace App\Modules\WeatherBoardManagement\Controllers;

use App\Http\Controllers\Controller;
use App\Events\TestEvent;
use App\Events\PriceChangeEvent;
use Event;
use Illuminate\Http\Request;
use App\Modules\WeatherBoardManagement\Models\Content;
use App\Modules\WeatherBoardManagement\Models\ContentType;
use Entrust;

class BroadcastPriceController extends Controller {


    private $content_type;

    function __construct(){
        $this->content_type = ContentType::where('name', 'price_list')->get()->first();
    }

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
        // Get user id from entrust
        $user_id = Entrust::user()->id;
        // Get item text in array format
        $item_text = $request->get('item_text');
        // Get item price in array format
        $item_price = $request->get('item_price');
        // Get current price list
        $price_list = Content::where('users_id', $user_id)
        ->where('content_types_id', 1)->get();
        // Delete current price list
        foreach ($price_list as $individual_item_price) {
           $individual_item_price->delete();
        }
        // Create new price list
        foreach ($item_text as $index => $value){
            $new_price_list = new Content();
            $new_price_list->text = $item_text[$index];
            $new_price_list->price = $item_price[$index];
            $new_price_list->content_types_id = $this->content_type->id;
            $new_price_list->users_id = $user_id;

            $new_price_list->save();
        }

        // Create event with item text & item price
        $my_event = new PriceChangeEvent($item_text, $item_price);
        // Fire event
        Event::fire($my_event);

        return back();
    }

}
