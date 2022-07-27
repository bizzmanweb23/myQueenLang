<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletPay extends Model
{
	
    use HasFactory;
	protected $table='wallet_pay';
    protected $fillable = [
	    'user_id',
        'amount',
        'order_id',
        'pay_at',
		'updated_at',
		'created_at'
    ];
}