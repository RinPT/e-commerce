@extends('layouts.admin.main')

@section('content')

    <main>
        <div class="row">
            <div class="col">
				<section class="card">
					<header class="card-header">
						<div class="card-actions">
							<a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
							<a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
						</div>

						<h2 class="card-title">Complains</h2>
					</header>
					<div class="card-body">
                        @if($complains->count())
                        <table style="width:100%">
                            <tr>
                                <th>Complain ID</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Sender User ID</th>
                                <th>Product ID </th>
                                <th> Options </th>
                            </tr>
                            @foreach($complains as $complains)
                                <tr>
                                <td> {{$complains->complain_id}} </td>
                                <td> {{$complains->message}} </td>
                                <td>
                                    <form action="{{route('update.complain',$complains)}}" method="post">

                                    @csrf
                                    <select name="status" id="status" >
                                    <option value="read">Read</option>
                                    <option value="unread">Unread</option>
                                    <option value="completed">Completed</option>
                                    <option value="incomplete">Incomplete</option>
                                    <option selected="selected"> {{$complains->status}}</option>
                                    </select>


                                    <button type="submit"> Update Status </button>
                                    </form>
                                </td>
                                <td> {{$complains->sender_uid}} </td>
                                <td> {{$complains->product_id}} </td>
                                <td>


                                    <form action="{{route('delete.complain',$complains)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-blue-500">Delete This Complain</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </table>
                    @else
                            <p> There are no complains yet. </p>
                    @endif
					</div>
				</section>
			</div>
        </div>

        <div class="row">
            <div class="col">
				<section class="card">
					<header class="card-header">
						<div class="card-actions">
							<a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
							<a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
						</div>

						<h2 class="card-title">Tickets</h2>
					</header>
					<div class="card-body">
                        @if($tickets->count())
				        <table style="width:100%">
				            <tr>
								<th>Ticket ID</th>
								<th>Store ID</th>
								<th>Title</th>
								<th>Message</th>
								<th>Status </th>
								<th> Urgency </th>
								<th> Attach</th>
								<th> Dept ID </th>
								<th> Options </th>
							</tr>
							@foreach($tickets as $tickets)
								<tr>
								    <td> {{$tickets->ticket_id}} </td>
								    <td> {{$tickets->store_id}} </td>
								    <td> {{$tickets->title}} </td>
								    <td> {{$tickets->message}} </td>
								    <td>
								      	<form action="{{route('update.ticket',$tickets)}}" method="post">

				            			@csrf
							                <select name="status" id="status" >
							                    <option value="read">Read</option>
							                    <option value="unread">Unread</option>
							                    <option value="completed">Completed</option>
							                    <option value="incomplete">Incomplete</option>
							                    <option selected="selected"> {{$tickets->status}}</option>
							                </select>


							                <button type="submit"> Update Status </button>
							            </form>
							        </td>
							        <td> {{$tickets->urgency}} </td>
								    <td> {{$tickets->attachments}} </td>
								    <td> {{$tickets->department_id}} </td>
								    <td>


									<form action="{{route('delete.ticket',$tickets)}}" method="post">
										@csrf
										@method('DELETE')
											<button type="submit" class="text-blue-500">Delete This Ticket</button>
									</form>
									 <a href="{{route('reply.ticket_display',$tickets)}}" class="p-3">Reply This Ticket </a>

									</td>
								</tr>

							@endforeach
						</table>
				        @else
					        <p> There are no tickets yet. </p>
				        @endif
					</div>
				</section>
			</div>
        </div>

        <div class="row">
            <div class="col">
				<section class="card">
					<header class="card-header">
						<div class="card-actions">
							<a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
							<a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
						</div>

						<h2 class="card-title">Ticket Replies</h2>
					</header>
					<div class="card-body">
                        @if($ticket_replies->count())
							        <table style="width:100%">
							            <tr>
											<th>Ticket Reply ID</th>
											<th>Author ID</th>
											<th>Rate</th>
											<th>Attach</th>
											<th>Ticket ID </th>
											<th> Store ID </th>
											<th> Options </th>

										</tr>
										@foreach($ticket_replies as $ticket_replies)
											<tr>
											    <td> {{$ticket_replies->ticket_reply_id}} </td>
											    <td> {{$ticket_replies->author_id}} </td>
											    <td> {{$ticket_replies->rate}} </td>
											    <td> {{$ticket_replies->attachmenst}} </td>
											    <td> {{$ticket_replies->ticket_id}} </td>
											    <td> {{$ticket_replies->store_id}} </td>
											    <td>
												<form action="{{route('delete.reply',$ticket_replies)}}" method="post">
													@csrf
													@method('DELETE')
														<button type="submit" class="text-blue-500">Delete This Reply</button>
												</form>

												</td>
											</tr>

										@endforeach
									</table>
							@else
								<p> There are no ticket replies yet. </p>
							@endif
					</div>
				</section>
			</div>
        </div>

        <div class="row">
            <div class="col">
				<section class="card">
					<header class="card-header">
						<div class="card-actions">
							<a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
							<a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
						</div>

						<h2 class="card-title">Activity Logs</h2>
					</header>
					<div class="card-body">
                        @if($activity_logs->count())
							        <table style="width:100%">
							            <tr>
											<th>Log ID</th>
											<th>User ID</th>
											<th>Username</th>
											<th>Author ID</th>
											<th>Description </th>
											<th> IP Address</th>
											<th> Options </th>

										</tr>
										@foreach($activity_logs as $activity_logs)
											<tr>
											    <td> {{$activity_logs->log_id}} </td>
											    <td> {{$activity_logs->user_id}} </td>
											    <td> {{$activity_logs->username}} </td>
											    <td> {{$activity_logs->author_id}} </td>
											    <td> {{$activity_logs->description}} </td>
											    <td> {{$activity_logs->ip_address}} </td>
											    <td>
												<form action="{{route('delete.activity_log',$activity_logs)}}" method="post">
													@csrf
													@method('DELETE')
														<button type="submit" class="text-blue-500">Delete This Log</button>
												</form>

												</td>
											</tr>

										@endforeach
									</table>
							@else
								<p> There are no activities yet. </p>
							@endif
					</div>
				</section>
			</div>
        </div>

        <div class="row">
            <div class="col">
				<section class="card">
					<header class="card-header">
						<div class="card-actions">
							<a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
							<a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
						</div>

						<h2 class="card-title">Configs</h2>
					</header>
					<div class="card-body">
                        <a href="{{route('add.config_display')}}" class="p-3">Add A New Configuration</a>

                        @if($configs->count())
                                       <table style="width:100%">
                                           <tr>
                                               <th>Config ID</th>
                                               <th>Key & Value </th>
                                               <th> Options </th>

                                           </tr>
                                           @foreach($configs as $configs)
                                               <tr>
                                                   <td> {{$configs->configs_id}} </td>
                                                   <td>
                                                   <form action="{{route('update.config',$configs)}}" method="post">
                                                       @csrf
                                                           <input type="text" name="key" placeholder="Configuration Key" value="{{$configs->key}}" />

                                                           <input type="text" name="value" placeholder="Configuration Value" value="{{$configs->value}}" />

                                                           <button type="submit" class="text-blue-500">Update This Configuration</button>
                                                   </form>
                                                   </td>
                                                   <td>
                                                   <form action="{{route('delete.config',$configs)}}" method="post">
                                                       @csrf
                                                       @method('DELETE')
                                                           <button type="submit" class="text-blue-500">Delete This Configuration</button>
                                                   </form>
                                                   </td>
                                               </tr>
                                           @endforeach
                                       </table>
                               @else
                                   <p> There are no configurations yet. </p>
                               @endif
					</div>
				</section>
			</div>
        </div>

        <div class="row">
            <div class="col">
				<section class="card">
					<header class="card-header">
						<div class="card-actions">
							<a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
							<a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
						</div>

						<h2 class="card-title">Permissions</h2>
					</header>
					<div class="card-body">
                        <a href="{{route('add.permission_display')}}" class="p-3">Add New Permission</a>

                        @if($permissions->count())
                                       <table style="width:100%">
                                           <tr>
                                               <th>Permission ID</th>
                                               <th>Permission Name </th>
                                               <th> Options </th>
                                           </tr>
                                           @foreach($permissions as $permissions)
                                               <tr>
                                                   <td> {{$permissions->permission_id}} </td>
                                                   <td> {{$permissions->perm_name}} </td>
                                                   <td>
                                                   <form action="{{route('delete.perm',$permissions)}}" method="post">
                                                       @csrf
                                                       @method('DELETE')
                                                           <button type="submit" class="text-blue-500">Delete This Permission</button>
                                                   </form>
                                                   </td>
                                               </tr>
                                           @endforeach
                                       </table>
                               @else
                                   <p> There are no permissions yet. </p>
                               @endif
					</div>
				</section>
			</div>
        </div>

        <div class="row">
            <div class="col">
				<section class="card">
					<header class="card-header">
						<div class="card-actions">
							<a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
							<a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
						</div>

						<h2 class="card-title">Groups</h2>
					</header>
					<div class="card-body">
                        <h5> User Group Management : </h5>
                        <h6> Add A New User Group : </h6>
			            <a href="{{route('add.user_group_display')}}" class="p-3">Add New User Group</a>

                        <h6> All User Groups : </h6>
			            @if($group->count())
			            	<table style="width:100%">
			            		<tr>
			            			<th>Group ID</th>
			            			<th>Group Name </th>
			            			<th>Group Permissions </th>
			            			<th> Options </th>
			            			</tr>
			            			@foreach($group as $group)
			            		<tr>
			            			<td> {{$group->group_id}} </td>
			            				<td> {{$group->name}} </td>
			            				<td>
			            				<form action="{{route('update.group_permissions',$group)}}" method="post">
			            				@csrf
			            				    <input type="text" name="permissions" placeholder="Group permissions" value="{{$group->permissions}}" />

			            				    <button type="submit" class="text-blue-500">Update Group Permissions </button>
			            				</form>

			            			</td>

			            			<td>
			            				<form action="{{route('delete.group',$group)}}" method="post">
			            				@csrf
			            				@method('DELETE')
			            					<button type="submit" class="text-blue-500">Delete This Group</button>
			            				</form>
			            			</td>
			            		</tr>
			            		@endforeach
			            	</table>
			            @else
			            	<p> There are no groups yet. </p>
			            @endif

                        <h6> Add A New Member To A User Group : </h6>
			                <form action="{{route('add.user_to_group')}}" method="post">
				            @csrf
				                <input type="number" name="user_id" placeholder="User ID"  />
				                <input type="number" name="group_id" placeholder="Group ID"  />

				                <button type="submit" class="text-blue-500">Add User To This Group</button>
			                </form>

			            <h6> Remove A Member From A User Group : </h6>
			                <form action="{{route('remove.user_from_group')}}" method="post">
				            @csrf
				                <input type="number" name="user_id" placeholder="User ID"  />
				                <input type="number" name="group_id" placeholder="Group ID"  />

				                <button type="submit" class="text-blue-500">Remove User From This Group</button>
			                </form>
					</div>
				</section>
			</div>
        </div>

    </main>

@endsection
