<?php

namespace App\Modules\WeatherBoardManagement\Controllers;

use App\Http\Controllers\Controller;

class BoardDataController extends Controller {

    public function boardData(){
        return view('WeatherBoardManagement::manage_board_data');
    }

}
