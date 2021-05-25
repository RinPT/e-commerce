<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDiscount extends Model
{
    use HasFactory;

    protected $table = 'category_discount';

    protected $fillable = [
        'category_id',
        'store_discount',
        'main_discount',
        'description',
        'start_date',
        'end_date',
    ];
}
