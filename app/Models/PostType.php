<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    protected $table = 'post_types';
    protected $fillable = ['name','slug','price','description'];
    public function posts(){
        return $this->hasMany('App\Models\Post', 'type_id', 'id');
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
