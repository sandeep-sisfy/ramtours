<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class airline extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	protected static function boot() {
		parent::boot();

		static::deleting(function ($airlines) {
			foreach ($airlines->flight_name()->get() as $flight) {
				$flight->delete();
			}
		});
	}
	public function flight_name() {
		return $this->hasMany(flight::class, 'flight_airline');
	}
	public function flight_sche_name() {
		return $this->hasMany(flight_schedule::class, 'airline_up');
	}
	public function flight_sche_down_name() {
		return $this->hasMany(flight_schedule::class, 'airline_down');
	}
}
