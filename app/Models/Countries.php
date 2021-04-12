<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;
    public $table = 'countries';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'iso_code',
        'status',
        'created_at',
        'updated_at',
  
    ];
}
