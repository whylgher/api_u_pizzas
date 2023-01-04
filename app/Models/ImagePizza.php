<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagePizza extends Model
{
    use HasFactory;

    protected $fillable = ['pizza_id', 'image'];

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }
}
