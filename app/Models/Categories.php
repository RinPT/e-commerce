<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    public $table = 'categories';

    protected $fillable = ['name','description','image', 'meta_title','meta_keywords', 'meta_description','parent_id', 'sort_order','status'];
}
