<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MLMTransferFunds extends Model
{
	
    use HasFactory;
	protected $table='transfer_funds';
    protected $fillable = [
	    'transfer_by',
        'amount',
        'status',
        'transfer_date'
    ];
}