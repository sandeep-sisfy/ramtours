<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    //
    public function getAboutDiscAttribute()
    {  
        return str_char_limit($this->about_user,50);
    }
    public function getFNameAttribute($value)
    {
        return substr(ucfirst($value), 0, 10);
    }
    public function getEmailAddressAttribute($value)
    {
        return substr(ucfirst($value), 0, 10);
    }
    public function setFNameAttribute($value)
    {
        return $this->attributes['fname']=ucfirst($value);
    }
    public function getLNameAttribute($value)
    {
        return substr(ucfirst($value), 0, 10);
    }
    public function setLNameAttribute($value)
    {
        return $this->attributes['lname']=ucfirst($value);
    }
}
