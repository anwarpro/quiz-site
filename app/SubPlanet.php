<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubPlanet extends Model
{
    protected $guarded = [];

    public function planet()
    {
        return $this->belongsTo(Planet::class);
    }

    public function sub_planet_contents()
    {
        return $this->hasMany(SubPlanetContent::class);
    }
}
