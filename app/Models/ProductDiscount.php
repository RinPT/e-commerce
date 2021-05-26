<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
    use HasFactory;

    protected $table = 'product_discount';
    protected $fillable = [
        'product_id',
        'store_discount',
        'main_discount',
        'description',
        'start_date',
        'end_date',
    ];
}
