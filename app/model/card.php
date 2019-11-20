<?php

namespace App\model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class card extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	public function hotel(){
        return $this->hasMany(hotel::class,'hotel_card');
    }

  
}
