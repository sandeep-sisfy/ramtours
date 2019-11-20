<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class hotel_type extends Model
{
    public function hotel(){
    	return $this->hasMany(hotel::class,'hotel_type');
    }
}
