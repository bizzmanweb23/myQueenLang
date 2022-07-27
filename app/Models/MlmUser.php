<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MlmUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'sponser_id',
        'placement_id',
        'placement',
        'birthday',
        'referal_code',
        'gender',
        'contact_address',
        'account_holder',
        'bank_name',
        'payment_information',
        'branch',
        'account_no',
        'placement_id_type',
        'user_id',
        'branch_id',
        'member_id',
        'postcode',
        'nationality',
        'mlm_status',
        'left_id',
        'right_id',
    ];
}
