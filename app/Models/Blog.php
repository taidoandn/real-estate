<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table    = 'blogs';
    protected $fillable = ['content','title'];

    public function setTitleAttribute($value){
        $this->title = $value;
        $this->slug = str_slug($value);
    }
}
