<?php

namespace App\Models;

use App\Models\Categories;
use App\Models\ProductComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public $table = 'products';
    protected $guarded = [];

    public function category() {
        $this->belongsTo(Categories::class);
    }

    public function comments() {
        $this->hasMany(ProductComment::class);
    }
}
