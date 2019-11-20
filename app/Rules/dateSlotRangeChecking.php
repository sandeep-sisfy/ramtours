<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class dateSlotRangeChecking implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $table_name;
    protected $main_table_id;    
    protected $table_filed_name;
    protected $start_date;
    protected $end_date;
    protected $price_id;
    protected $slots='';

    public function __construct($table_name,$main_table_id,$table_filed_name,$start_date,$end_date,$price_id)
    {
        $this->table_name=$table_name;
        $this->main_table_id=$main_table_id;        
        $this->table_filed_name=$table_filed_name;
        $this->start_date=$start_date;
        $this->end_date=$end_date;
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
        $results = DB::table($this->table_name)->Where([[$this->table_filed_name, $this->main_table_id],['price_start_date', '>=', $this->start_date],['price_end_date', '<=', $this->end_date]])->get();
        foreach ($results as $result) {
            if($this->price_id==$result->id){
                continue;
            }
        $this->slots.=$result->price_start_date.' To ' .$result->price_end_date.' , ';
        }
        if(!empty($this->slots)){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     * @return string
     */
    public function message()
    {
        return $this->slots. 'Price slot alrady exist in given dates '.$this->start_date.' To '.$this->end_date;
    }
}
