<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    static public function save_rami_setting($setting_name,$setting_value){
    	$setting = self::where('setting_name', $setting_name)->get()->count();
    	$save_setting = array('setting_name' =>$setting_name,
    						  'setting_value'=>$setting_value, 
    						  'updated_at'=>date('Y-m-d H:i:s')
    					);
    	if($setting==0){
    		$save_setting['created_at']=date('Y-m-d H:i:s');
    	   	self::insert($save_setting);
    	}elseif($setting==1){
    		self::where('setting_name', $setting_name)->update($save_setting);
    	}elseif($setting>1){
    		self::where('setting_name', $setting_name)->delete();
    		$save_setting['created_at']=date('Y-m-d H:i:s');
    	   	self::insert($save_setting);
    	}else{
    		$save_setting['created_at']=date('Y-m-d H:i:s');
    	   	self::insert($save_setting);
    	}
    }

    static public function get_rami_setting($setting_name){
        $setting=self::where('setting_name', $setting_name)->get(['setting_value'])->first();
        if(!empty($setting)){
            return $setting->setting_value;
        }
        return $setting_name;

    }

}
