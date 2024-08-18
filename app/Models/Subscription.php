<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable=['name','email','phone','start_date','end_date','is_active','offer_id'];
    public function sports(){
        return $this->belongsToMany(Sport::class,'sport_subscription');
    }
    public function payment(){
        return $this->hasOne(Payment::class);
    }
    public function suspension(){
        return $this->hasOne(Suspension::class);
    }
    public function offer(){
        return $this->belongsTo(Offer::class);
    }

}
