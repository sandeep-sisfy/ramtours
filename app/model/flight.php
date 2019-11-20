<?php
namespace App\model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class flight extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected static function boot() {
		parent::boot();
		static::deleting(function ($flights) {
			foreach ($flights->flight_sche_name()->get() as $flight_sche) {
				$flight_sche->delete();
			}
		});
	}
	public function location_source() {
		return $this->belongsTo(Location::class, 'flight_source');
	}
	public function location_desti() {
		return $this->belongsTo(Location::class, 'flight_desti');
	}
	public function airline_name() {
		return $this->belongsTo(airline::class, 'flight_airline');
	}
	public function flight_sche_name() {
		return $this->hasMany(flight_schedule::class, 'flight_up');
	}
	public function flight_sche_down_name() {
		return $this->hasMany(flight_schedule::class, 'flight_down');
	}
	public function flight_schedule_connection(){
		return  $this->hasMany(flight_schedule_connection::class, 'flight_id');
	}
}
