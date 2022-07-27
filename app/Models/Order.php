<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_unique',
        'user_id',
		'user_unique',
        'payment_method',
        'shipping_method',
        'is_bill_same_ship',
        'billing_id',
        'shipping_id',
        'user_ip',
        'order_currency',
        'quantity',
        'order_sum',
        'total_pv',
        'coupon_code',
        'discount_amount',
        'how_may_discount',
        'discount_type',
        'after_discount_price',
        'shipping_charge',
        'payment_status',
        'total',
		'status_for_old_order'
    ];
}