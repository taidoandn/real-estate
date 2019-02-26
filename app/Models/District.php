<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $fillable = ['name','city_id'];
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');
    }
    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'district_id', 'id');
    }
}
