<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;
    public $table = 'Permissions';
    protected $primaryKey = 'permission_id';
    protected $fillable = [
        'permission_name',
        
    ];
}
