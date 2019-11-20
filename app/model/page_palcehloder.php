<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class page_palcehloder extends Model
{
   static protected $pakage_page_placeholders;
    function __construct(){
       self::$pakage_page_placeholders = array('basic_details' => 'פרטים בסיסיים  ',
                                                'apartment'=>'דירה  ',
                                                'gallery'=>'גלריה ',
                                                'choice_of_apartments'=>' בחירת דירות  ',
                                                'hotel_review'=>'ביקורת מלונות ',
                                                'map'=>'מפה ',
                                                'flights'=>'טיסות',
                                                'vehicle'=>'רכב  ',
                                        );
    }

    static public function save_page_placeholder($name,$value, $type){
    	$setting = self::where([['field_name', $name],['page_type', $type]])->get()->count();
    	$save_setting = array('field_name' =>$name,
    						  'field_text'=>$value,
    						  'page_type'=>$type,
    						  'updated_at'=>date('Y-m-d H:i:s')
    					);
    	if($setting==0){
    		$save_setting['created_at']=date('Y-m-d H:i:s');
    	   	self::insert($save_setting);
    	}elseif($setting==1){
    		self::where([['field_name', $name],['page_type', $type]])->update($save_setting);
    	}elseif($setting>1){
    		self::where([['field_name', $name],['page_type', $type]])->delete();
    		$save_setting['created_at']=date('Y-m-d H:i:s');
    	   	self::insert($save_setting);
    	}else{
    		$save_setting['created_at']=date('Y-m-d H:i:s');
    	   	self::insert($save_setting);
    	}
    }
    static public function get_page_placeholder($name, $type){
        $setting=self::where([['field_name', $name],['page_type', $type]])->get(['field_text'])->first();
        if($type==1){
           $pace_holders = self::$pakage_page_placeholders;
        }
        if(!empty($setting)){
            return $setting->field_text;
        }elseif (!empty($pace_holders)) {
            if(!empty($pace_holders[$name])){
                return $pace_holders[$name]; 
            }else{
                return '';
            }
        }else{
            return ''; 
        }

    }
    static public function delete_page_placeholder($name, $type){
        self::where([['field_name', $name],['page_type', $type]])->delete();
    }

}
