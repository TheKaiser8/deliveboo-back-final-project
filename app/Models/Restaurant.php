<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = ['user_id'];
    protected $appends = ['image_url'];

    // metodo per aggiungere una proprietà al model se non abbiamo una colonna a database con l'obiettivo di restituire l'url completo dell'immagine
    protected function getImageUrlAttribute()
    {
        return $this->image ? asset("storage/$this->image") : 'https://via.placeholder.com/400x200';
    }

    public function kitchens()
    {
        return $this->belongsToMany(Kitchen::class);
    }

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
