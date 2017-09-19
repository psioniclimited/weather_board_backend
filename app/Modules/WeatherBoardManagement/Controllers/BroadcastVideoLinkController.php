<?php

namespace App\Modules\WeatherBoardManagement\Controllers;

use App\Http\Controllers\Controller;
use App\Events\VideoChangeEvent;
use Event;
use Illuminate\Http\Request;
use App\Modules\WeatherBoardManagement\Models\Content;
use App\Modules\WeatherBoardManagement\Models\ContentType;
use Entrust;
use Storage;
use File;
class BroadcastVideoLinkController extends Controller {

    private $content_type_video;

    function __construct(){
        $this->content_type_video = ContentType::where('name', 'video')->get()->first();
    }

    /**
     * [updateVideoLinkProcess -update video content]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateVideoLinkProcess(Request $request){
        // $content = $request->all();
        // $content['content_types_id'] = $this->content_type_video->id;
        // $content['users_id'] = Entrust::user()->id;

        $edit_content = Content::where('content_types_id', $this->content_type_video->id);

        if ($request->hasFile('video_file')) {
            $filename = $request->file('video_file'); 
            if ($filename->isValid()) {
                $filename->move(storage_path('/app/video/'), $filename->getClientOriginalName());
                // $content['text'] = '/app/video/' . $filename->getClientOriginalName();
                $video_link_local = '/app/video/' . $filename->getClientOriginalName();
                $edit_content->update(['text' => $video_link_local]); 

                $video_link = 'http://localhost:8000/getvideo/' . $filename->getClientOriginalName();
                $video_type = 'local';
            }
        } 
        else {
            // $content['text'] = $request->get('text');
            $video_link = $request->get('text');
            $video_type = 'youtube';
            $edit_content->update(['text' => $video_link]);
        }
        
        // Create event with ticker text
        $my_event = new VideoChangeEvent($video_link, $video_type);
        // Fire event
        Event::fire($my_event);
        return back();
    }

    public function serveVideo($filename){
        $file_path = storage_path() . '/app/video/' . $filename;
        $file = File::get($file_path);
        return response()->download($file_path);
    }
}
