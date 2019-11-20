<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class room_type extends Model
{
    public function room() {
		return $this->hasMany(room::class,'room_type');
	}
}
