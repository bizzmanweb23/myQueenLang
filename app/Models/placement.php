<?php
e
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class placement extends Model
{
    use HasFactory;
    protected $fillable = [
        'placement_id',
        'placement',
        'left_id',
        'right_id',
    ];
}
