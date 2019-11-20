<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class no_of_year implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $month;
    protected $date;    
    protected $compare_no_year;

    public function __construct($month, $date, $compare_no_year)
    {
        $this->month=$month;
        $this->date=$date;
        $this->compare_no_year=$compare_no_year;
       
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

        if(empty($this->month)||empty($this->date)){
            return true;
        } 

        elseif(rami_get_no_of_year_diff(date('Y-m-d'), $value.'-'. $this->month.'-'.$this->date)>$this->compare_no_year){
            return false;
           
        }else{
            return true;
        }
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Age passenger should be less than or equal'.$this->compare_no_year;
    }
}
