<?php

namespace App\Modules\WeatherBoardManagement\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	protected $hidden = array('created_at', 'updated_at');
	protected $fillable = ['text', 'price', 'content_types_id', 'users_id'];

}
