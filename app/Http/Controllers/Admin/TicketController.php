<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Store;
use App\Models\Author;
use App\Models\Tickets;
use Illuminate\Http\Request;
use App\Models\Ticket_Replies;
use App\Models\Ticket_Departments;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{

    private $logged_author;

    public function __construct() {
        $this->logged_author = app('App\Http\Controllers\GlobalController')->index();
    }

    public function create() {

        $departments = Ticket_Departments::get();

        return view('admin.tickets.create', [
            'departments' => $departments,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:ticket_departments,name',
            'description' => 'required|max:255',
        ]);


        $department = Ticket_Departments::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status === 1 ? 1 : 0,
        ]);

        return back()->with('created', 'New department ('.$department->name.') is added to the system.');
    }

    public function update(Request $request, $id) {

        $department = Ticket_Departments::find($id);

        $this->validate($request, [
            'description' => 'required|max:255',
        ]);

        if($department->name !== $request->name) {
            $this->validate($request, [
                'name' => 'required|unique:ticket_departments,name',
            ]);

            $department->update([
                'name' => $request->name,
            ]);
        }

        $department->update([
            'description' => $request->description,
            'status' => $request->status === 1 ? 1 : 0,
        ]);

        return back()->with('updated', 'The department information has been updated.');
    }

    public function department_destroy($id) {
        $department = Ticket_Departments::find($id);
        $department->delete();

        return back()->with('deleted', 'The department has been deleted from the system!');
    }

	public function getAuthorTickets() {
		$tickets = DB::table('tickets')
        ->join('ticket_departments', 'ticket_departments.id', '=', 'tickets.department_id')
        ->where('receiver_type', '=', 'admin')
        ->select('tickets.id', 'tickets.title', 'tickets.status', 'tickets.urgency', 'tickets.created_at', 'ticket_departments.name as department')
        ->get();

        $stores = Store::get();
        $departments = Ticket_Departments::get();

        return view('admin.tickets.admin.index', [
            'tickets' => $tickets,
            'stores' => $stores,
            'departments' => $departments
        ]);
	}

    public function authorTicket($tid) {
        $ticket = Tickets::find($tid);

        $replies = Ticket_Replies::where('ticket_id',$tid)->get();

        foreach ($replies as $key => $reply) {
            $replies[$key]->user = User::find($reply->sender_id);

        }

        $user = User::find($ticket->sender_id);

        return view('admin.tickets.admin.viewTicket',[
            'tid' => $tid,
            'ticket' => $ticket,
            'replies' => $replies,
            'user' => $user,
        ]);
    }

    public function create_ticket(Request $request){

        $id = Tickets::create([
            'department_id' => $request->department,
            'sender_id' => $this->logged_author->id,
            'sender_type' => 'admin',
            'receiver_id' => $request->store,
            'receiver_type' => 'store',
            'title' => $request->title,
            'message' => $request->message,
            'status' => 'open',
            'urgency' => $request->urgency,
            'sender_unread' => 0,
            'receiver_unread' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('admin.view_author_tickets.view',['tid' => $id ]);
    }

    public function answer_ticket($tid, Request $request){
        $ticket = Tickets::find($tid);

        Ticket_Replies::create([
            'ticket_id' => $tid,
            'sender_id' => $this->logged_author->id,
            'sender_type'   => 'admin',
            'receiver_id' => $ticket->receiver_id,
            'receiver_type' => $ticket->receiver_type,
            'message' => $request->message,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success','Your message has been sent.');
    }

	public function getStoreTickets() {
		$tickets = DB::table('tickets')
        ->join('ticket_departments', 'ticket_departments.id', '=', 'tickets.department_id')
        ->where('receiver_type', '=', 'store')
        ->select('tickets.id', 'tickets.title', 'tickets.status', 'tickets.urgency', 'tickets.created_at', 'ticket_departments.name as department')
        ->get();

        return view('admin.tickets.store.index', [
            'tickets' => $tickets,
        ]);
	}

    public function storeTicket($tid) {
        $ticket = Tickets::find($tid);

        $replies = Ticket_Replies::where('ticket_id',$tid)->get();

        foreach ($replies as $key => $reply) {
            $replies[$key]->user = User::find($reply->sender_id);

        }

        $user = User::find($ticket->sender_id);
        $store = Store::find($ticket->receiver_id);

        return view('admin.tickets.store.viewTicket',[
            'tid' => $tid,
            'ticket' => $ticket,
            'replies' => $replies,
            'user' => $user,
            'store' => $store,
        ]);
    }

    public function getUserTickets() {
        $tickets = DB::table('tickets')
        ->join('ticket_departments', 'ticket_departments.id', '=', 'tickets.department_id')
        ->where('sender_type', '=', 'user')
        ->select('tickets.id', 'tickets.title', 'tickets.status', 'tickets.urgency', 'tickets.created_at', 'ticket_departments.name as department')
        ->get();

        return view('admin.tickets.user.index', [
            'tickets' => $tickets,
        ]);
	}

    public function userTicket($tid) {
        $ticket = Tickets::find($tid);

        $replies = Ticket_Replies::where('ticket_id',$tid)->get();

        foreach ($replies as $key => $reply) {
            if($reply->sender_type == 'admin'){
                $replies[$key]->admin = Author::find($reply->sender_id);
            }else{
                $replies[$key]->admin = Store::find($reply->sender_id);
            }
        }

        $user = User::find($ticket->sender_id);

        return view('admin.tickets.user.viewTicket',[
            'tid' => $tid,
            'ticket' => $ticket,
            'replies' => $replies,
            'user' => $user
        ]);
    }

    public function getCreateTicket() {

		return view('admin.create_new_ticket');
	}

    public function ticket_destroy($id) {
        $department = Tickets::find($id);
        $department->delete();

        return back()->with('deleted', 'The ticket has been deleted from the system!');
    }
}
