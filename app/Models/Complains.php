<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complains extends Model
{
    use HasFactory;
    public $table = 'complains';
    protected $primaryKey = 'complain_id';
    protected $fillable = [
    	'message',
    	
    ];
}
