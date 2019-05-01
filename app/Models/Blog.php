<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table    = 'blogs';
    protected $fillable = ['content','title','author','image'];

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getContentHtmlAttribute(){
        return \Parsedown::instance()->text($this->content);
    }

    public static function boot(){
        parent::boot();
        static::deleting(function($blog){
            unlinkImage($blog->image);
        });
    }

    public function getUrlAttribute(){
        return route('blogs.show',$this->slug);
    }

    public function getImageUrlAttribute(){
        if (!empty($this->image)) {
            return asset('uploads/images/'.$this->image);
        }
    }
}
