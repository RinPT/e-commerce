@extends('layouts.admin.sidebar')
@section('content')

<main>

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

</main>

@section