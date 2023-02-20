<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded= ['user_id'];

    public function kitchens(){
        return $this->belongsToMany(Kitchen::class);
        
    }

    public function user(){
        return $this->belongsTo(Users::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
