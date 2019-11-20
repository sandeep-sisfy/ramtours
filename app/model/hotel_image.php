<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class hotel_image extends Model
{
    public function hotel()
	{
    	return $this->belongsTo(hotel::class,'hotel_id');
    }
}
