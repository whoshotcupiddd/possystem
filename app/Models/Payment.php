<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'card_number', 'expiration_date', 'cvv', 'cardholder_name', 'order_id', 'payment_method', 'amount_paid', 'change',
    ];
}
