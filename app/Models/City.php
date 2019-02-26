<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = ['name'];
    public function districts()
    {
        return $this->hasMany('App\Models\District', 'city_id', 'id');
    }
    public function posts()
    {
        return $this->hasManyThrough('App\Models\Post', 'App\Models\District');
    }
}
