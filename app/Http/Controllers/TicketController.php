<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Store;
use App\Models\Ticket_Replies;
use App\Models\Tickets;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create_ticket(Request $request){
        if($request->who == 'admin'){
            $request->store = 0;
        }
        $id = Tickets::create([
            'department_id' => $request->department,
            'sender_id' => auth()->user()->id,
            'sender_type' => 'user',
            'receiver_id' => $request->store,
            'receiver_type' => $request->who,
            'title' => $request->title,
            'message' => $request->message,
            'status' => 'open',
            'urgency' => $request->urgency,
            'sender_unread' => 0,
            'receiver_unread' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('ticket.view',['tid' => $id ]);
    }

    public function view_ticket($tid){
        $ticket = Tickets::find($tid);

        $replies = Ticket_Replies::where('ticket_id',$tid)->get();

        foreach ($replies as $key => $reply) {
            if($reply->sender_type == 'admin'){
                $replies[$key]->admin = Author::find($reply->sender_id);
            }else{
                $replies[$key]->admin = Store::find($reply->sender_id);
            }
        }

        return view('users/viewticket',[
            'tid' => $tid,
            'ticket' => $ticket,
            'replies' => $replies
        ]);
    }

    public function answer_ticket($tid,Request $request){
        $ticket = Tickets::find($tid);

        Ticket_Replies::create([
            'ticket_id' => $tid,
            'sender_id' => auth()->user()->id,
            'sender_type'   => 'user',
            'receiver_id' => $ticket->receiver_id,
            'receiver_type' => $ticket->receiver_type,
            'message' => $request->message,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success','Your message has been sent.');
    }
}
