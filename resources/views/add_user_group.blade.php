@extends('layouts.main')

@section('content')
    <main class="mt-3">
        <div class="d-flex justify-content-center">
            <div class="w-8/12 bg-white p-6 rounded-lg">
                <h> New Group : </h>
                <form action="{{route('add.user_group')}}" method="post">

				    @csrf
					<label for="name ">Enter Group Name :</label>
					<input type="text" id="name" name="name">

                    <label for="permissions ">Enter Permissions :</label>
                    <input type="text" id="permissions" name="permissions">

			        <button type="submit"> Save </button>
				</form>
            </div>
          </div>
    </main>
@endsection