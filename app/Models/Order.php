<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'store_id',
        'store_name',
        'store_url',
        'user_id',
        'user_type',
        'name',
        'surname',
        'username',
        'email',
        'gender',
        'comment',
        'total',
        'order_status',
        'currency_code',
        'ip_address',
        'user_agent',
        'created_at',
        'updated_at',
    ];
}
