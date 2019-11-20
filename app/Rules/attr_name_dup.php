<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class attr_name_dup implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $cur_attr_loc;
    protected $new_attr_loc='';    
    protected $cur_attr_name='';

    public function __construct($new_attr_loc, $cur_attr_loc, $cur_attr_name)
    {
        $this->cur_attr_loc=$cur_attr_loc;
        $this->new_attr_loc=$new_attr_loc;
        $this->cur_attr_name=$cur_attr_name;
       
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
        if(($this->new_attr_loc==$this->cur_attr_loc)&&($this->cur_attr_name==$value)){
            return true;
        }
        $results = DB::table('attractions')->Where([['attraction_location', $this->new_attr_loc], ['attraction_title',$value]])->first();
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
        return 'This Attractions allready exist for current location';
    }
}
