@extends('layouts.main')

@section('content')
    <main class="mt-3">
        <div class="d-flex justify-content-center">
            <div class="w-8/12 bg-white p-6 rounded-lg">
                <h> New Permission : </h>
                <form action="{{route('add.permission')}}" method="post">

				    @csrf
					<label for="name ">Enter Permission Name :</label>
					<input type="text" id="name" name="name">

			        <button type="submit"> Save </button>
				</form>
            </div>
          </div>
    </main>
@endsection