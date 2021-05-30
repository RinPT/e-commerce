<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product_Images extends Model
{
    use HasFactory;
    public $table = 'product_images';
    protected $guarded = [];

}