<?php

namespace App\Modules\WeatherBoardManagement\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\WeatherBoardManagement\Models\Content;
use App\Modules\WeatherBoardManagement\Models\ContentType;

class BoardDataController extends Controller {

    private $content_type_price;
    private $content_type_ticker;
    private $content_type_video;

    function __construct(){
        $this->content_type_price = ContentType::where('name', 'price_list')->get()->first();
        $this->content_type_ticker = ContentType::where('name', 'ticker')->get()->first();
        $this->content_type_video = ContentType::where('name', 'video')->get()->first();
    }

    /**
     * [boardData -loads the weather board]
     * @return [view] [description]
     */
    public function boardData(){
        $price_list = Content::where('content_types_id', $this->content_type_price->id)->get();
        $ticker_list = Content::where('content_types_id', $this->content_type_ticker->id)->get();
    	$video_link = Content::where('content_types_id', $this->content_type_video->id)->get();
        
        return view('WeatherBoardManagement::manage_board_data')
        ->with('price_list', $price_list)
        ->with('ticker_list', $ticker_list)
        ->with('video_link', $video_link);
    }

}
