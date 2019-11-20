<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class package extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	public function hotel() {
		return $this->belongsTo(hotel::class, 'package_hotel');
	}
	public function package_desti() {
		return $this->belongsTo(Location::class, 'package_flight_location');
	}
}
