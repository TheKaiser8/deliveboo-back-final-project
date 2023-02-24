<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['image_url'];

    // metodo per aggiungere una proprietà al model se non abbiamo una colonna a database con l'obiettivo di restituire l'url completo dell'immagine
    protected function getImageUrlAttribute()
    {
        if (str_starts_with($this->image, "uploads")) {
            return $this->image ? asset("storage/$this->image") : "'https://via.placeholder.com/400x200'";
        }
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
