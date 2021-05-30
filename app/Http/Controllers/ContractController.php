<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index_privacy(){
        $privacy = Config::where('key','privacy_policy')->value('value');
        return view('privacy_policy',[
            'privacy' => $privacy
        ]);
    }

    public function index_purchase(){
        $purchase = Config::where('key','purchase_rules')->value('value');
        return view('purchase_rules',[
            'purchase' => $purchase
        ]);
    }

    public function index_registration(){
        $registration = Config::where('key','registration_rules')->value('value');
        return view('registration_rules',[
            'registration' => $registration
        ]);
    }
}
