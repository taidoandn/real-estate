<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    protected $tables = 'property_details';
    protected $fillable = ['floor','bath','room','balcony','toilet','bed_room','dinning_room','living_room','post_id'];
    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id', 'id');
    }
}
