<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $table='category_advertisements';
    protected $fillable = [
        'id',
        'category_id',
        'image',
    ];
}
