<?php

namespace App\Modules\WeatherBoardManagement\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\WeatherBoardManagement\Models\Content;

class BoardDataController extends Controller {

    /**
     * [boardData -loads the weather board]
     * @return [view] [description]
     */
    public function boardData(){
    	$price_list = Content::all();
    	// dd($price_list);
        return view('WeatherBoardManagement::manage_board_data')
        ->with('price_list', $price_list);
    }

}
