<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductComment extends Model
{
    use HasFactory;

    protected $fillable= [
        'comment',
        'product_rate',
        'cargo_rate',
    ];

    public function product() {
        $this->belongsTo(Product::class);
    }
}
