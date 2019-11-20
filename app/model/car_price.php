<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class car_price extends Model
{
    public function car()
	{
	    return $this->belongsTo(car::class, 'car_id');
	}
}
