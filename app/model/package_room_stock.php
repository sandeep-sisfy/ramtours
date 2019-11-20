<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class package_room_stock extends Model
{
    public function room() {
		return $this->belongsTo(room::class,'room_id');
	}
}
