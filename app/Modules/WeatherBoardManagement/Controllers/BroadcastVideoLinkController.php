<?php

namespace App\Modules\WeatherBoardManagement\Controllers;

use App\Http\Controllers\Controller;
use App\Events\VideoChangeEvent;
use Event;
use Illuminate\Http\Request;
use App\Modules\WeatherBoardManagement\Models\Content;
use App\Modules\WeatherBoardManagement\Models\ContentType;
use Entrust;

class BroadcastVideoLinkController extends Controller {


    private $content_type;

    function __construct(){
        $this->content_type = ContentType::where('name', 'video')->get()->first();
    }

    /**
     * [updateTickerTextProcess -update ticker text]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateVideoLinkProcess(Request $request){
        // Get user id from entrust
        $user_id = Entrust::user()->id;
        // Get link from view
        $new_youtube_link = $request->get('youtube_link');
        // Get current video link
        $current_video_link = Content::where('users_id', $user_id)
        ->where('content_types_id', $this->content_type->id)->get();
        // Delete current video link
        $current_video_link[0]->delete();
        // Create new video link
        $new_video_link = new Content();
        $new_video_link->text = $new_youtube_link;
        $new_video_link->content_types_id = $this->content_type->id;
        $new_video_link->users_id = $user_id;

        $new_video_link->save();

        // Create event with ticker text
        $my_event = new VideoChangeEvent($new_youtube_link);
        // Fire event
        Event::fire($my_event);
        return back();
    }

}
