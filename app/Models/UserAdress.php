<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdress extends Model
{
    use HasFactory;
    public $table = 'user_address';
    protected $primaryKey = 'address_id';

    protected $fillable = [
        'name',
    	'surname',
    	'user_id',
    	'user_type',
    	'company',
    	'tax_no',
    	'country_id',
    	'city',
    	'address',
    	'address_type',
    	'postcode',
    	'telephone',
    ];

}
