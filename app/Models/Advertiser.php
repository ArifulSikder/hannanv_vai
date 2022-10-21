<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Advertiser extends Authenticatable
{
    use SoftDeletes;
    protected $guard = 'advertiser';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hiddecd ax x sd  n for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function ads()
    {
        return $this->hasMany(Advertisement::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    // is onlive user
    function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function user_contacts()
    {
        return $this->hasMany(UserContact::class,'advertiser_id');
    }
}
