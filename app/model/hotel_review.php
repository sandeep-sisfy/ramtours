<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class hotel_review extends Model
{
    public function hotel() {
		return $this->belongsTo(hotel::class, 'hotel_id');
	}
}
