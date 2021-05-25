<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreDiscount extends Model
{
    use HasFactory;

    protected $table = 'store_discount';

    protected $fillable = [
        'store_id',
        'store_discount',
        'main_discount',
        'description',
        'start_date',
        'end_date',
    ];
}
