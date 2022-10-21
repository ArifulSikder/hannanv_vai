<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advertisement extends Model
{
    use HasFactory;
    protected $table = "advertisements";
    protected $fillable = ['title', 'status', 'image', 'slug', 'created_at', 'updated_at'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sub_category()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
    }

    public function images()
    {
        return $this->hasMany(AdImage::class);
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }
    public function complains()
    {
        return $this->hasMany(AdComplain::class);
    }
    public function ad_message()
    {
        return $this->hasMany(UserContact::class, 'advertisement_id');
    }
   

}
