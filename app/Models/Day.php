<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    protected $fillable=['day'];
    public function sports(){
        return $this->belongsToMany(Sport::class,'day_sport');
    }
}
