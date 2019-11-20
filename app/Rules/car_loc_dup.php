<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class car_loc_dup implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $cur_car_loc;
    protected $pre_car_loc;   
    protected $pre_car_title;

    public function __construct($cur_car_loc,$pre_car_loc,$pre_car_title)
    {
        $this->cur_car_loc=$cur_car_loc;
        $this->pre_car_loc=$pre_car_loc;
        $this->pre_car_title=$pre_car_title;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(($this->cur_car_loc==$this->pre_car_loc)&&($this->pre_car_title==$value)){
            return true;
        }
        $results = DB::table('cars')->Where([['location', $this->cur_car_loc], ['car_title',$value]])->first();
        if(!empty($results)){
             return false;
        }
        return true;
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This car allready exist for current location.';
    }
}
