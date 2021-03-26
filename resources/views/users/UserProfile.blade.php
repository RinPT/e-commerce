@extends('layouts.main')

@section('content')
  <div class="flex justify-center">


  	@if(!empty($errors))
	    @if($errors->any())
		    <div class="alert alert-danger"> 
		        <ul>
		            @foreach($errors->all() as $error)
		                <li>{!! $error !!}</li>
		            @endforeach
		        </ul>
		    </div>
	    @endif
	@endif


    <div class="w-8/12 bg-white p-6 rounded-lg" style="margin-top: 50px;
  margin-bottom: 50px;
  margin-right: 75px;
  margin-left: 40px;">
    	<h> User Profile Menu: </h>

    	<ul class="flex items" style="flex-direction:column;
  flex-wrap: wrap;">
            <li>
               <a href="{{route('user.address',$user)}}" class="p-3"> My Address Details </a>
            </li>

            <li>
               <a href="{{ route('home')}}" class="p-3"> My Cards </a>
            </li>

            <li>
               <a href="{{ route('home')}}" class="p-3"> My Tickets </a>
            </li>

            <li>
               <div>
			      	<form action="{{route('user.destroy',$user)}}" method="post">
			      		@csrf
			      		@method('DELETE')
			      		<button type="submit" class="text-blue-500"> Delete My Account </button>
			      	</form>
	    		</div>
            </li>

         </ul>
    </div>

    <div class="w-8/12 bg-white p-6 rounded-lg " style="margin-top: 50px;
  margin-bottom: 50px;
  margin-right: 75px;
  margin-left: 40px;">
    	<h> My Personal Information </h>

    	<form method="post" action="{{route('user.update', $user)}}" enctype="multipart/form-data" >

    	@csrf
    		<h6> Your Name : <input type="text" name="name" placeholder="Your Name" value="{{ $user->name }}" /></h6>
		    <h6> Your Surname : <input type="text" name="surname" placeholder="Your Surname" value="{{ $user->surname }}" /> </h6>
		    <h6> Your Username : <input type="text" name="username" placeholder="Your Username" value="{{ $user->username }}" /> </h6>
		    <h6> Your Email : <input type="email" name="email" placeholder="Your Email" value="{{ $user->email }}" /> </h6>   
			<h6> 
				<label for="phone">Your Phone Number: </label>
				<input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="for ex : 123-45-678"value="{{ $user->phone }}">

			</h6>   
			<h6> Your Gender : 
				<select id="gender" name="gender" value={{$user->gender}}>
				  <option value="Female">Female</option>
				  <option value="Male">Male</option>
				  <option value="Prefer not to answer">Prefer not to answer</option>
				  <option selected="selected"> {{$user->gender}}</option>
				</select>
			</h6>  
			<h6> Your Date Of Birth : <input type="date" name="date_of_birth" placeholder="Your Date of Birth" value="{{ $user->date_of_birth }}" /> </h6> 

		    <button type="submit">Save</button>
		</form>

	</div>


	 <div class="w-8/12 bg-white p-6 rounded-lg " style="margin-top: 50px;
  margin-bottom: 50px;
  margin-right: 75px;
  margin-left: 40px;">

		<h> Change My Password : </h>
    	<form method="post" action="{{route('user.password', $user)}}" >

    	@csrf

    		<h6> Your Old Password : <input type="password" name="old_password" placeholder="Your Old Password" /> </h6>
			
		    <h6> Your New Password : <input type="password" name="password" placeholder="Your New Password" /> </h6>
		    <h6> Repeat Your New Password Please : <input type="password" name="password_confirmation" placeholder="Your New Password Again"/> </h6>

		     <button type="submit">Change</button>
		</form>
	</div>

  </div>
@endsection
