<?php

namespace App\Modules\WeatherBoardManagement\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\WeatherBoardManagement\Models\Content;
use App\Modules\WeatherBoardManagement\Models\ContentType;

class SendDataController extends Controller {

    private $content_type_price;
    private $content_type_ticker;
    private $content_type_video;

    function __construct(){
        $this->content_type_price = ContentType::where('name', 'price_list')->get()->first();
        $this->content_type_ticker = ContentType::where('name', 'ticker')->get()->first();
        $this->content_type_video = ContentType::where('name', 'video')->get()->first();
    }

    /**
     * [getData description]
     * @param  [type] $param [description]
     * @return [type]        [description]
     */
    public function getData(Request $request){
        $price_list = Content::where('content_types_id', $this->content_type_price->id)->get();
        $ticker_list = Content::where('content_types_id', $this->content_type_ticker->id)->get();
        $video_link = Content::where('content_types_id', $this->content_type_video->id)->get();

        if ($request->data == 'price_list') {
            $data = response()->json($price_list); 
        }
        elseif ($request->data == 'ticker_list') {
            $data = response()->json($ticker_list); 
        }
        else {
            $data = response()->json($video_link); 
        }

        return $data;
    }

}
