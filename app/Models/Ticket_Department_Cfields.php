<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_Department_Cfields extends Model
{
    use HasFactory;
    public $table = 'Ticket_Department_Cfields';
    protected $primaryKey = 'ticket_dep_cfield_id';
}
