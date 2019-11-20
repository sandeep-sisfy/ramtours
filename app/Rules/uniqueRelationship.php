<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class uniqueRelationship implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void

     */
    protected $table_name;
    protected $prv_value;
    protected $field_rel_id;
    protected $rel_field_name;
    protected $pvr_rel_id;
    public    $msg_field;
    public    $rel_msg_field;
    public function __construct($table,$prv_value,$field_rel_id,$rel_field_name,$pvr_rel_id, $msg_field, $rel_msg_field)
    {
        $this->table_name=$table;
        $this->prv_value=$prv_value;
        $this->field_rel_id=$field_rel_id;
        $this->rel_field_name=$rel_field_name;
        $this->pvr_rel_id=$pvr_rel_id;
        $this->msg_field=$msg_field;
        $this->rel_msg_field=$rel_msg_field;
    }

    /**
     * Determine if the validation rule passes.
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {  
        if(!empty($value)){
            if(!empty($this->prv_value)&&($this->prv_value == $value)&&($this->pvr_rel_id == $field_rel_id )){
                return true;
            }
            $result= DB::table($this->table_name)->Where([[$attribute, $value],[$this->rel_field_name, $this->field_rel_id]])->select($attribute)->first();

            if(!empty($result->{$attribute})){
                return false;
            }else{
                return true;
            }
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
        return 'The '.$this->msg_field.' is already exist in selected '.$this->rel_msg_field.'.';
    }
}
