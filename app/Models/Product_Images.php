<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Images extends Model
{
    use HasFactory;
    public $table = 'product_images';

    protected $fillable = [
        'product_id',
        'image',
    ];
}
