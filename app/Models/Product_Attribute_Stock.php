<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Attribute_Stock extends Model
{
    use HasFactory;
    public $table = 'product_attributes_stocks';

    protected $fillable = [
        'product_id',
        'attribute',
        'stock',
    ];
}
