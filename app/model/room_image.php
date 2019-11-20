<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class room_image extends Model
{
    public function room()
	{
    	return $this->belongsTo(room::class,'room_id');
    }
}
