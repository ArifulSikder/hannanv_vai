<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Favourite extends Model
{
    use HasFactory;

    public function ad()
    {
        return $this->belongsTo(Advertisement::class,'advertisement_id');
    }

}
