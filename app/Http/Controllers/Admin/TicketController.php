<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket_Departments;

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

    public function destroy($id) {
        $department = Ticket_Departments::find($id);
        $department->delete();

        return back()->with('deleted', 'The department has been deleted from the system!');
    }

	public function getAuthorTickets() {

		return view('admin.author_tickets', [
			'tickets' => Tickets::get(),
		]);
	}

	public function getStoreTickets() {

		return view('admin.store_tickets', [
			'tickets' => Tickets::get(),
		]);
	}

    public function getUserTickets() {


	}

    public function getCreateTicket() {

		return view('admin.create_new_ticket');
	}
}
