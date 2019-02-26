<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title','image','purpose','address','latitude','longitude','price','negotiable','view','status',
        'district_id','user_id','detail_id','area','unit','type_id','description'
    ];

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }


    public function detail(){
        return $this->hasOne('App\Models\PropertyDetail', 'post_id', 'id');
    }

    public function district(){
        return $this->belongsTo('App\Models\District', 'district_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id')->select(['id', 'name']);
    }

    public function distances(){
        return $this->belongsToMany('App\Models\Distance', 'post_distances', 'post_id', 'distance_id')->withPivot('meters');
    }

    public function city(){
        return $this->district->belongsTo('App\Models\City', 'city_id', 'id');
    }

    public function conveniences(){
        return $this->belongsToMany('App\Models\Convenience', 'post_conveniences', 'post_id', 'convenience_id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\PropertyImage', 'post_id', 'id');
    }

}
