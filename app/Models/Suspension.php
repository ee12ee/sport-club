<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suspension extends Model
{
    use HasFactory;
    protected $fillable =['suspended_at','reason','resumed_at','subscription_id'];
    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }
}
