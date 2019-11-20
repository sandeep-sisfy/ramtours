<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\model\flight;

class flight_schedule extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $loction_id;
	protected $airlines;
	protected $where1;
	public function airline_name() {
		return $this->belongsTo(airline::class, 'airline_up');
	}
	public function flight_name() {
		return $this->belongsTo(flight::class, 'flight_up');
	}
	public function flight_name_down() {
		return $this->belongsTo(flight::class, 'flight_down');
	}
	public function airline_name_down() {
		return $this->belongsTo(airline::class, 'airline_down');
	}
	public function flight_schedule_connection() {
		return $this->hasMany(flight_schedule_connection::class, 'flight_schedule_id');
	}

	public function get_flight_schedule_from_airline($airline){
		$this->airlines=$airline;
		$flight_schedules=self::whereHas('flight_schedule_connection', function ($query) {
		    $query->whereHas('flight', function ($query) {
		    	$query->whereIn('flight_airline',$this->airlines);
		    });

		})->get(['flight_schedules.flight_sche_title', 'flight_schedules.id'])->toArray();
		$flight_schedules2=self::whereIn('airline_up',$this->airlines)->orWhereIn('airline_down',$this->airlines)->get('flight_sche_title', 'id')->toArray();
		return array_merge($flight_schedules,$flight_schedules2);
	}

	public function flight_schedule_front_search($start_date, $end_date, $locs, $month){
		$this->loction_id=$locs;
		$flight_schedules=self::whereHas('flight_name', function ($query) {
		    $query->whereIn('flight_desti',$this->loction_id);
		})->whereMonth('up_departure_time',$month)->where([['up_departure_time', '>=', date('Y-m-d')]])->orderBy('up_departure_time', 'asc')->get();
		return $flight_schedules;
	}
	public function flight_schedule_front_by_location($loc, $is_count=0, $skip=0, $take=9){
		$this->loction_id=$loc;
		$flight_schedules=self::whereHas('flight_name', function ($query) {
		    $query->where('flight_desti',$this->loction_id);
		})->where([['up_departure_time', '>=', date('Y-m-d')]])->orderBy('up_departure_time', 'asc')->skip($skip)->take($take)->get();
		if($is_count==1){
		 return	self::whereHas('flight_name', function ($query) {
		    $query->where('flight_desti',$this->loction_id);
		    })->where([['up_departure_time', '>=', date('Y-m-d')]])->count();
		}
		return $flight_schedules;
	}
	public function flight_schedule_search_by_date($where, $where1, $is_count=0, $skip=0, $take=9){
		$this->where1=$where1;
		$flight_schedules=self::whereHas('flight_name', function ($query) {
		    $query->where($this->where1);})->where($where)->orderBy('up_departure_time', 'asc')->skip($skip)->take($take)->get();
		if($is_count==1){
		 return	$flight_schedules=self::whereHas('flight_name', function ($query) {
		    $query->where($this->where1);})->where($where)->count();
		}
		return $flight_schedules;
	}
	public function flight_schedule_dates_by_src_desti($where, $where1){
		$this->where1=$where1;
		$flight_schedules=self::whereHas('flight_name', function ($query) {
		    $query->where($this->where1);})->where($where)->orderBy('up_departure_time', 'asc')->get(['up_departure_time','id', 'down_departure_time']);
		return $flight_schedules;
	}
	

	
}
