<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complains;
use App\Models\Tickets;
use App\Models\Ticket_Replies;
use App\Models\Activity_Logs;
use App\Models\Configs;
use App\Models\Permissions;
use App\Models\Group;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
    	$group=Group::get();
    	$permissions= Permissions::get();
    	$configs= Configs::get();
    	$activity_logs=Activity_Logs::get();
  		$ticket_replies=Ticket_Replies::get();
    	$complains=Complains::get();
    	$tickets=Tickets::get();

    	return view('admin',[
    		'complains'=> $complains,
    		'tickets' => $tickets,
    		'ticket_replies'=>$ticket_replies,
    		'activity_logs' => $activity_logs,
    		'configs' => $configs,
    		'permissions'=> $permissions,
    		'group'=> $group,
    	]);
    }

    public function update_complain(Request $request, Complains $complains)
    {
  		$complains->status= $request->status;
  		$complains->save();

  		return $this->index();
    }

    public function delete_complain(Request $request, Complains $complains)
    {

    	$complains->delete();

    	return $this->index();
    }

    public function update_ticket(Request $request, Tickets $tickets)
    {

  		$tickets->status= $request->status;
  		$tickets->save();

  		return $this->index();
    }

    public function delete_ticket(Request $request, Tickets $tickets)
    {

    	$tickets->delete();

    	return $this->index();
    }


    public function reply_ticket(Request $request, Tickets $tickets)
    {


  		Ticket_Replies::create([
    	'ticket_id' => $tickets-> ticket_id,
    	'store_id' => $tickets-> store_id,

    	'attachments' => json_encode($request->file()),
    	'rate' => $request-> rate,
    	'author_id' => auth()->user()->user_id,
    	]);

		return $this->index();
    }

    public function reply_ticket_display(Request $request, Tickets $tickets)
    {

    	return view('ticket_reply',[
    		'tickets'=> $tickets,


    	]);
    }

    public function delete_reply(Request $request, Ticket_Replies $ticket_replies)
    {

    	$ticket_replies->delete();

		return $this->index();
    }

    public function delete_activity_log(Request $request, Activity_Logs $activity_logs)
    {

    	$activity_logs->delete();

    	return $this->index();
    }


     public function delete_config(Request $request, Configs $configs)
    {

    	$configs->delete();

   		return $this->index();
    }

    public function update_config(Request $request, Configs $configs)
    {

  		$configs->key= $request->key;
  		$configs->value= $request->value;
  		$configs->save();

    	return $this->index();
    }

    public function add_config_display(Request $request)
    {
    	return view('add_configs');

    }

    public function add_config(Request $request)
    {
  		Configs::create([
    	'key' => $request-> key,
    	'value' => $request-> value,
    	]);

		return $this->index();
    }


    public function add_permission_display(Request $request)
    {
    	return view('add_permission');

    }

    public function add_permission(Request $request)
    {
  		Permissions::create([
    	'perm_name' => $request-> name,
    	]);

		return $this->index();
    }

    public function delete_permission(Request $request, Permissions $permissions)
    {

    	$permissions->delete();
    	return $this->index();
    }


    public function add_user_group_display(Request $request)
    {
    	return view('add_user_group');

    }

    public function add_user_group(Request $request)
    {
  		Group::create([
    	'name' => $request-> name,
    	'permissions' => $request ->permissions,
    	]);

		return $this->index();
    }

    public function delete_group(Request $request,Group $group)
    {

    	$group->delete();

    	return $this->index();
    }

    public function update_group_permissions(Request $request,Group $group)
    {

  		$group->permissions= $request->permissions;
  		$group->save();

    	return $this->index();
    }

    public function add_user_to_group(Request $request)
    {
    	$user=User::get()->where('user_id',$request->user_id)->first();
  		$user->user_group= $request->group_id;
  		$user->save();

    	return $this->index();
    }

    public function remove_user_from_group(Request $request)
    {
    	$user=User::get()->where('user_id',$request->user_id)->first();
  		$user->user_group= null;
  		$user->save();

    	return $this->index();
    }

}
