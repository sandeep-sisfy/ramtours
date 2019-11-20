<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {
	public function children() {
		return $this->hasMany(Location::class, 'loc_par');
	}
	public function parent() {
		return $this->belongsTo(Location::class, 'loc_par');
	}

	public function source_flights() {
		return $this->hasMany(flight::class, 'flight_source');
	}
	public function desti_flights() {
		return $this->hasMany(flight::class, 'flight_desti');
	}
	public function hotel_name() {
		return $this->hasMany(hotel::class, 'hotel_location');
	}
	public function packages() {
		return $this->hasMany(package::class, 'package_flight_location');
	}
	public function attraction(){
    	return $this->hasMany(attraction::class,'attraction_location');
    }
    public function car_loc(){
    	return $this->hasMany(car::class,'location');
    }
	Static function del_child_locatons($id) {
		self::where('loc_par', $id)->delete();
	}

}
