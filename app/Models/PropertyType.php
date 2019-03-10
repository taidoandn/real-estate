<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $table =  'property_types';
    protected $fillable = ['name','slug'];
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function posts(){
        return $this->hasMany('App\Models\Post','type_id','id');
    }
}
