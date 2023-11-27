<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function planet_contents()
    {
        return $this->hasMany(PlanetContent::class);
    }

    public function sub_planets()
    {
        return $this->hasMany(SubPlanet::class);
    }
}
