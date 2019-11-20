<?php



namespace App\model;



use Illuminate\Database\Eloquent\Model;



class attraction extends Model

{

    public function location()

	{

	    return $this->belongsTo(Location::class, 'attraction_location');

	}

}

