<?php

namespace App\model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class car extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];

    public function car_supp_name()
	{
	    return $this->belongsTo(car_suplier::class, 'car_suplier');
	}
	public function car_price()
	{
	    return $this->hasMany(car_price::class, 'car_id');
	}
	public function car_loc_name()
	{
	    return $this->belongsTo(Location::class, 'location');
	}
}
