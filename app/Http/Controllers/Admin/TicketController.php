<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tickets;
use Illuminate\Http\Request;
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
            'status' => ($request->status === 1 ? 1 : 0) || ($request->status === 0 ? 0 : 1),
        ]);

        return back()->with('updated', 'The department information has been updated.');
    }

    public function depratment_destroy($id) {
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

        return view('admin.tickets.admin.index', [
            'tickets' => $tickets,
        ]);
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

    public function getUserTickets() {
        $tickets = DB::table('tickets')
        ->join('ticket_departments', 'ticket_departments.id', '=', 'tickets.department_id')
        ->where('receiver_type', '=', 'user')
        ->select('tickets.id', 'tickets.title', 'tickets.status', 'tickets.urgency', 'tickets.created_at', 'ticket_departments.name as department')
        ->get();

        return view('admin.tickets.user.index', [
            'tickets' => $tickets,
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
