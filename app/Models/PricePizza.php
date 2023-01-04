<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricePizza extends Model
{
    use HasFactory;

    protected $table = 'prices_pizzas';

    protected $fillable = ['12_size', '18_size', 'pizza_id'];

    /**
     * Get the Pizza that owns the PricePizza
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }
}
