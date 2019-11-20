<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class flight_schedule_connection extends Model
{
    public function flight() {
		return $this->belongsTo(flight::class, 'flight_id');
	}
	 public function flight_schedule() {
		return  $this->hasMany(flight_schedule_connection::class, 'flight_schedule_id');
	}
}
