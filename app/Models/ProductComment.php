<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductComment extends Model
{
    use HasFactory;
    public $table = 'product_comments';
    protected $guarded = [];

    public function product() {
        $this->belongsTo(Product::class);
    }
}
