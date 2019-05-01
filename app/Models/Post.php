<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\NewPostNotification;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title','image','purpose','address','latitude','longitude','price','negotiable','view','status','description','start_date','end_date',
        'area','unit','district_id','user_id','detail_id','type_id', 'property_type_id'
    ];

    protected $appends = ['url'];

    protected $currency = "VND";

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public static function boot(){
        parent::boot();
        static::created(function($post){
            $post->load('user');
            foreach (Admin::all() as $admin) {
                if ($admin->hasRole('Admin')) {
                    $admin->notify(new NewPostNotification($post));
                }
            }
        });

        static::deleting(function($post){
            unlinkImage($post->image);

            $images = $post->images;
            foreach ($images as $image) {
                unlinkImage($image->path);
            }
        });

    }
    public function type(){
        return $this->belongsTo('App\Models\PostType', 'type_id', 'id');
    }

    public function detail(){
        return $this->hasOne('App\Models\PropertyDetail', 'post_id', 'id');
    }
    public function property_type(){
        return $this->belongsTo('App\Models\PropertyType', 'property_type_id', 'id');
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
        $now = date('Y-m-d');
        return $query->where('status','published')->where('start_date',"<=",$now)->where('end_date','>=',$now);
    }

    public function scopeIsExpired($query){
        $now = date('Y-m-d');
        return $query->where('status','expired')->orWhere('status','published')->where('end_date','<',$now);
    }

    public function getUrlAttribute(){
        return route('posts.show',$this->slug);
    }

    public function getImageUrlAttribute(){
        if (!empty($this->image)) {
            return asset('uploads/images/'.$this->image);
        }
    }

    public function imageDetail($path){
        if (optional($this->images)->contains('path',$path)) {
            return asset('uploads/images/'.$path);
        }
    }

    public function getPriceFormatAttribute(){
        $unit = $this->attributes['unit'];
        switch ($unit) {
            case 'total_area':
                return number_format($this->attributes['price'],0,',','.')." $this->currency / Tổng m<sup>2</sup>";
                break;
            case 'm2':
                return number_format($this->attributes['price'],0,',','.')." $this->currency / m<sup>2</sup>";
                break;
            case 'month':
                return number_format($this->attributes['price'],0,',','.')." $this->currency / Tháng";
                break;
            default:
                return number_format($this->attributes['price'],0,',','.')." $this->currency / Năm";
                break;
        }
    }

    public function getPurposeFormatAttribute(){
        if ($this->purpose == 'sale') {
            return "Bán";
        }else{
            return "Cho thuê";
        }
    }

    public function scopeSort($q,$sortBy){
        switch ($sortBy) {
            case 'latest':
                $q->latest();
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

    public function getTotalPriceAttribute(){
        $price_per_day = ($this->getDateDiff() * $this->type->price) ;
        $vat           = $price_per_day * 10/100; //vat : 10%
        return $price_per_day + $vat;
    }


    public function getDateDiff(){
        return dateDiff($this->start_date,$this->end_date);
    }
}
