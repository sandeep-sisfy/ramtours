<?php

namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;
use DB;

class ramiDatePrice implements Rule
{
    /**
     * Create a new rule instance.
     * @return void
     */
    protected $table_name;
    protected $main_table_id;
    protected $table_filed_name;
    protected $date_slot_exist;
    protected $price_id;
    
    public function __construct($table_name,$main_table_id,$table_filed_name,$price_id)
    {
        $this->table_name=$table_name;
        $this->main_table_id=$main_table_id;
        $this->table_filed_name=$table_filed_name;
        $this->price_id=$price_id;
    }
    /**
     * Determine if the validation rule passes.
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {      
        $result = DB::table($this->table_name)->Where([[$this->table_filed_name, $this->main_table_id],['price_start_date', '<=',$value],['price_end_date', '>=',$value]])->first();
        //dd($result);
        if(!empty($this->price_id) && (!empty($result)) && ($result->id==$this->price_id)){
            return true;
        }
        if(!empty($result))
        {
            $this->date_slot_exist=$result->price_start_date.' To '.$result->price_end_date;
            return false;
        }else{
            return true;
        }
    }
    /**
     * Get the validation error message.
     * @return string
     */
    public function message()
    {
        return 'Price also exist for existing price dates are : '.$this->date_slot_exist;
    }
}