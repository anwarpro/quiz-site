<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubPlanetContent extends Model
{
    protected $guarded = [];

    public function replace_cr($value)
    {
        return str_replace("\r", "", trim($value));
    }

    public function replace_crn($value)
    {
        $value = str_replace("<strong>","<strong><font color=\"#078ef9\">",$value);
        $value = str_replace("</strong>","</font></strong>",$value);
        return str_replace(["\r\n", "\n", "\r"], "", trim($value));
    }
    
    public function replace_quot($value)
    {
        $value = str_replace("‘","'", str_replace("“", "\"", trim($value)));
        
        return str_replace("’","'", str_replace("”", "\"", $value));
    }
    
    public function getCodeAttribute($value)
    {
        if ($value == '' || $value == null) {
            return 'code block';
        }

        return $this->replace_quot($value);
    }

    public function getCode2Attribute($value)
    {
        if ($value == '' || $value == null) {
            return null;
        }

        return $this->replace_quot($value);
    }

    public function getDes01Attribute($value)
    {
        if ($value == '' || $value == null) {
            return null;
        }

        return $this->replace_crn($value);
    }

    public function getDes02Attribute($value)
    {
        if ($value == '' || $value == null) {
            return null;
        }

        return $this->replace_crn($value);
    }

    public function getDes03Attribute($value)
    {
        if ($value == '' || $value == null) {
            return null;
        }

        return $this->replace_crn($value);
    }

    public function setDes01Attribute($value)
    {
        $this->attributes['des_01'] = $this->replace_crn(trim($value));
    }

    public function setDes02Attribute($value)
    {
        $this->attributes['des_02'] = $this->replace_crn(trim($value));
    }

    public function setDes03Attribute($value)
    {
        $this->attributes['des_03'] = $this->replace_crn(trim($value));
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = $this->replace_cr(trim($value));
    }

    public function setCode2Attribute($value)
    {
        $this->attributes['code2'] = $this->replace_cr(trim($value));
    }

    public function sub_planet()
    {
        return $this->belongsTo(SubPlanet::class);
    }
}
