<?php

namespace App\Http\Controllers\Store;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Author;
use App\Models\Tickets;
use Illuminate\Http\Request;
use App\Models\Ticket_Replies;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    private $logged_author;

    public function __construct() {
        $this->logged_author = app('App\Http\Controllers\GlobalController')->index();
    }

    public function index() {

        $tickets = DB::table('tickets')
        ->join('ticket_departments', 'ticket_departments.id', '=', 'tickets.department_id')
        ->where([
            ['receiver_type', '=', 'store'],
            ['receiver_id', '=', $this->logged_author->id],
        ])
        ->select('tickets.id', 'tickets.title', 'tickets.status', 'tickets.urgency', 'tickets.created_at', 'ticket_departments.name as department')
        ->get();

        return view('store.tickets.index', [
            'tickets' => $tickets,
        ]);
    }

    public function view_ticket($tid){
        $ticket = Tickets::find($tid);

        $replies = Ticket_Replies::where('ticket_id',$tid)->get();

        foreach ($replies as $key => $reply) {
            $replies[$key]->user = User::find($reply->sender_id);

        }

        $user = User::find($ticket->sender_id);

        return view('store.tickets.viewTicket',[
            'tid' => $tid,
            'ticket' => $ticket,
            'replies' => $replies,
            'user' => $user,
        ]);
    }

    public function answer_ticket($tid,Request $request){
        $ticket = Tickets::find($tid);

        Ticket_Replies::create([
            'ticket_id' => $tid,
            'sender_id' => $this->logged_author->id,
            'sender_type'   => 'store',
            'receiver_id' => $ticket->receiver_id,
            'receiver_type' => $ticket->receiver_type,
            'message' => $request->message,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success','Your message has been sent.');
    }
}
