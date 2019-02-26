<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    protected $table = 'distances';
    protected $fillable = ['name'];
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_distances', 'distance_id', 'post_id')->withPivot('meters');
    }
}
