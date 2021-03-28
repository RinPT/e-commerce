<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_Logs extends Model
{
    use HasFactory;
    public $table = 'ticket_logs';
    protected $primaryKey = 'log_id';
}