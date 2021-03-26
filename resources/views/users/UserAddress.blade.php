@extends('layouts.main')

@section('content')
  <div class="flex justify-center">

    <div class="w-8/12 bg-white p-6 rounded-lg">
    	<h>Address Details Page </h>


    </div>

    <div style="position: absolute; margin-top: 100px; background: white; border-radius: 10px; padding: 20px; " >

    @if($user_address->count())
	      	@foreach($user_address as $user_address)
	      		<p> {{$user_address->name}} </p>
	      		<p> {{$user_address->surname}} </p>
	      		<p> {{$user_address->user_type}} </p>
	      		<p> {{$user_address->company}} </p>
	      		<p> {{$user_address->tax_no}} </p>
	      		<p> {{$user_address->city}} </p>
	      		<p> {{$user_address->address}} </p>
	      		<p> {{$user_address->address_type}} </p>
	      		<p> {{$user_address->post_code}} </p>
	      		<p> {{$user_address->telephone}} </p>
	      		<a href="{{ route('address.display',[$user,$user_address])}}" class="p-3"> Update This Address </a>
	      		<form action="{{route('address.destroy',[$user,$user_address])}}" method="post">
			      		@csrf
			      		@method('DELETE')
			      		<button type="submit" class="text-blue-500"> Delete This Address </button>
			    </form>

	      	@endforeach
    @else
      		<p> There are no added addresses yet. </p>
    @endif

    <a href="{{ route('address.add',$user)}}" class="p-3"> Add New Address </a>
    </div>
  </div>
@endsection
