<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'name',
        'description',
        'status',
        'amount',
        'tax',
        'total',
        'order',
        'drink'
    ];

    protected $casts = [
        'order' => 'array',
        'drink' => 'array',
    ];
}
