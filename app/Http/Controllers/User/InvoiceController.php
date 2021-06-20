<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function view_invoice($id){

        $invoice = Billing::where('invoice_no',$id)->first();

        return view('users/viewbill',[
            'invoice' => $invoice
        ]);
    }
}
