<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category'];

    public function image()
    {
        return $this->hasMany(ImagePizza::class);
    }

    /**
     * Get all of the Prices for the Pizza
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices()
    {
        return $this->hasMany(PricePizza::class)->select('regular', 'large');
    }
}
