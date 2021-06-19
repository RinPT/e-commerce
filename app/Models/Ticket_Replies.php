<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_Replies extends Model
{
    use HasFactory;
    public $table = 'ticket_replies';
    protected $primaryKey = 'ticket_reply_id';
    protected $guarded = [];
}
