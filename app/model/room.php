<?php



namespace App\model;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;



class room extends Model

{

    use SoftDeletes;

    protected $dates = ['deleted_at'];    

    public function room_images() {

		return $this->hasMany(room_image::class, 'room_id');

	}

	public function hotel() {

		return $this->belongsTo(hotel::class, 'room_hotel');

	}

	public function room_type_name() {

		return $this->belongsTo(room_type::class,'room_type');

	}
        public function room_prices() {
		return $this->hasMany(room_price::class, 'room_id');
	}

}