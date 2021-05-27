<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store_Requests extends Model
{
    use HasFactory;
    protected $table = 'store_requests';
    protected $guarded = [];
}
