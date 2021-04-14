<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
    use HasFactory;
    public $table = 'currencies';

    protected $fillable = ['name','code','image', 'prefix','suffix', 'rate','status'];
}
