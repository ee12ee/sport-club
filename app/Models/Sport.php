<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function videos(){
        return $this->hasMany(Video::class);
    }
    public function days(){
        return $this->belongsToMany(Day::class,'day_sport');
    }
    public function rooms(){
        return $this->hasMany(Room::class);
    }
    public function facilities(){
        return $this->belongsToMany(Facility::class,'facility_sport');
    }
    public function subscriptions(){
        return $this->belongsToMany(Subscription::class,'sport_subscription');
    }
}
