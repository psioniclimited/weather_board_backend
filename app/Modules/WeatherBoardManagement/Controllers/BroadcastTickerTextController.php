<?php

namespace App\Modules\WeatherBoardManagement\Controllers;

use App\Http\Controllers\Controller;
use App\Events\TickerChangeEvent;
use Event;
use Illuminate\Http\Request;
use App\Modules\WeatherBoardManagement\Models\Content;
use App\Modules\WeatherBoardManagement\Models\ContentType;
use Entrust;

class BroadcastTickerTextController extends Controller {


    private $content_type;

    function __construct(){
        $this->content_type = ContentType::where('name', 'ticker')->get()->first();
    }

    /**
     * [updateTickerTextProcess -update ticker text]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateTickerTextProcess(Request $request){
        // Get user id from entrust
        $user_id = Entrust::user()->id;
        // Get ticker text in array format
        $ticker_text = $request->get('ticker_text');
        // Get current ticker list
        $ticker_list = Content::where('users_id', $user_id)
        ->where('content_types_id', $this->content_type->id)->get();
        // Delete current ticker list
        foreach ($ticker_list as $individual_ticker_list) {
           $individual_ticker_list->delete();
        }
        // Create new ticker list
        foreach ($ticker_text as $index => $value){
            $new_ticker_list = new Content();
            $new_ticker_list->text = $ticker_text[$index];
            $new_ticker_list->content_types_id = $this->content_type->id;
            $new_ticker_list->users_id = $user_id;

            $new_ticker_list->save();
        }

        // Create event with ticker text
        $my_event = new TickerChangeEvent($ticker_text);
        // Fire event
        Event::fire($my_event);
        return back();
    }

}
