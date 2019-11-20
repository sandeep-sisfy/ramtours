<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class updateUnique implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $table_name;
    protected $prv_value;
    protected $msg_field;

    public function __construct($table,$prv_value, $msg_field)
    {
        $this->table_name=$table;
        $this->msg_field=$msg_field;
        $this->prv_value=$prv_value;
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
       if($value != $this->prv_value){
        $result= DB::table($this->table_name)->Where($attribute, $value)->select($attribute)->first();
            if(!empty($result->{$attribute})){   
                return false;
            }else{
                return true;
            }
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
        return 'The '.$this->msg_field.' Must Be unique.' ;
    }
}
