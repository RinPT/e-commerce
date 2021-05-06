<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    public $table = "user_wishlist";

    protected $fillable = [
        'user_id',
        'product_id',
    ];

}
