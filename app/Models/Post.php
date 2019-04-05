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

    protected $currency = "VND";

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }


    public function detail(){
        return $this->hasOne('App\Models\PropertyDetail', 'post_id', 'id');
    }
    public function property_type(){
        return $this->belongsTo('App\Models\PropertyType', 'type_id', 'id');
    }

    public function district(){
        return $this->belongsTo('App\Models\District', 'district_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function distances(){
        return $this->belongsToMany('App\Models\Distance', 'post_distances', 'post_id', 'distance_id')->withPivot('meters');
    }

    public function city(){
        return $this->district->city();
    }

    public function conveniences(){
        return $this->belongsToMany('App\Models\Convenience', 'post_conveniences', 'post_id', 'convenience_id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\PropertyImage', 'post_id', 'id');
    }

    public function scopeIsPublished($query){
        return $query->where('status','published');
    }

    public function getUrlAttribute(){
        return route('posts.show',$this->slug);
    }

    public function getPriceFormatAttribute(){
        $unit = $this->attributes['unit'];
        switch ($unit) {
            case 'total_area':
                return number_format($this->attributes['price'],0,',','.')." $this->currency / Total Area";
                break;
            case 'm2':
                return number_format($this->attributes['price'],0,',','.')." $this->currency / m<sup>2</sup>";
                break;
            case 'month':
                return number_format($this->attributes['price'],0,',','.')." $this->currency / Month";
                break;
            default:
                return number_format($this->attributes['price'],0,',','.')." $this->currency / Year";
                break;
        }
    }

    public function scopeSort($q,$sortBy){
        switch ($sortBy) {
            case 'latest':
                $q->orderBy('created_at','desc');
                break;
            case 'price_asc':
                $q->orderBy('price','asc');
                break;
            case 'price_desc':
                $q->orderBy('price','desc');
                break;
            default:
                $q->orderBy('id','desc');
                break;
        }
    }

    public function getDescriptionHtmlAttribute(){
        return \Parsedown::instance()->text($this->description);
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function favorites(){
        return $this->belongsToMany(User::class,'favorites')->withTimestamps();
    }

    public function getIsFavoritedAttribute(){
        return $this->isFavorited();
    }

    public function isFavorited(){
        return $this->favorites()->where('user_id',auth()->id())->count() > 0;
    }


}
