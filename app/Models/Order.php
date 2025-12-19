<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_email',
        'status',
        'total_amount',
        'shipping_address',
        'city',
        'state',
        'postal_code',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
        'total_amount' => 'decimal:2',
    ];
}
