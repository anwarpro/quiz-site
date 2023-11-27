<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function getOptionsAttribute($value)
    {
        return array_values(json_decode($value, true) ?: []);
    }

    public function setOptionsAttribute($value)
    {
        $this->attributes['options'] = json_encode(array_values($value));
    }
}
