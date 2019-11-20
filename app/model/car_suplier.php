<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class car_suplier extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	  protected static function boot() 
    {
      parent::boot();
        static::deleting(function($car_supliers) {
          foreach ($car_supliers->car_name()->get() as $car) {
            $car->delete();
          }
    	});
    }
    public function car_name()
	{
	    return $this->hasMany(car::class, 'car_suplier');
	}
}
