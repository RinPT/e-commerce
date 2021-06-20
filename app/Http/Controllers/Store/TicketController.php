<?php

namespace App\Http\Controllers\Store;

use App\Models\Tickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

    public function destroy($id) {
        Tickets::find($id)->delete();
        return back()->with('deleted', 'Ticket removed from the system!');
    }
}
