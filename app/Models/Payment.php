<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=['amount','payment_date','payment_method','subscription_id'];
    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }
}
