<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'name',
        'category_id',
        'description',
        'price',
        'cargo_price',
        'currency_id',
    ];

    public function category() {
        $this->belongsTo(Categories::class);
    }
}
