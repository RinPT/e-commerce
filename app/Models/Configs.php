<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configs extends Model
{
    use HasFactory;
    public $table = 'configs';
    protected $primaryKey = 'configs_id';

    protected $fillable = [
    	'key',
    	'value',
    	
    ];
}
