<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = 'store';
    protected $fillable = [
        'id',
        'name',
        'username',
        'email',
        'password',
        'logo',
        'url',
        'tax_no',
        'country_id',
        'city',
        'address',
        'phone',
        'status',


    ];
}
