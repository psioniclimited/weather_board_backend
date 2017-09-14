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


    private $content_type_youtube_video;
    private $content_type_local_video;

    function __construct(){
        $this->content_type_youtube_video = ContentType::where('name', 'youtube_video')->get()->first();
        $this->content_type_local_video = ContentType::where('name', 'local_video')->get()->first();
    }

    /**
     * [updateTickerTextProcess -update ticker text]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateVideoLinkProcess(Request $request){
        // Get user id from entrust
        $user_id = Entrust::user()->id;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            if ($file->isValid()) {
                // // Get current local video link
                // $current_local_video_link = Content::where('users_id', $user_id)
                // ->where('content_types_id', $this->content_type_local_video->id)->get();
                // // Delete current local video link
                // $current_local_video_link[0]->delete();

                $destination_path = 'public';
                $file_name = $file->getClientOriginalName();
                $upload_success = $file->move($destination_path, $file_name);
                $video_source = '/'.$destination_path.'/'.$file_name;
                // Create new video link
                $new_local_video_link = new Content();
                $new_local_video_link->content_types_id = $this->content_type_local_video->id;
                $new_local_video_link->users_id = $user_id;
                $new_local_video_link->text = $video_source;

                $new_local_video_link->save();
            }
        } 
        else {
            $video_source = $request->get('youtube_link');
            // Get current youtube video link
            $current_youtube_video_link = Content::where('users_id', $user_id)
            ->where('content_types_id', $this->content_type_youtube_video->id)->get();
            // Delete current youtube video link
            $current_youtube_video_link[0]->delete();
            // Create new video link
            $new_youtube_video_link = new Content();
            $new_youtube_video_link->content_types_id = $this->content_type_youtube_video->id;
            $new_youtube_video_link->users_id = $user_id;
            $new_youtube_video_link->text = $video_source;

            $new_youtube_video_link->save();
        }

        // Create event with ticker text
        $my_event = new VideoChangeEvent($video_source);
        // Fire event
        Event::fire($my_event);
        return back();
    }

}
