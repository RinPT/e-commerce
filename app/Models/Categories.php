<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    public $table = 'categories';

    protected $fillable = ['name','description','image', 'meta_title','meta_keywords', 'meta_description','parent_id', 'sort_order','status'];

    public function parent() {

        return $this->hasOne('App\Models\Categories', 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany('App\Models\Categories', 'parent_id', 'id');

    }

    public static function tree() {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', 0)->get();

    }

    public function products() {
        $this->hasMany(Product::class);
    }
}
