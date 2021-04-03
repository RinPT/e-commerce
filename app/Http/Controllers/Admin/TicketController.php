<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    
    
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

    public function getCreateTicket() {

		return view('admin.create_new_ticket');
	}
}
