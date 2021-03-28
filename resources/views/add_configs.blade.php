@extends('layouts.main')

@section('content')
    <main class="mt-3">
        <div class="d-flex justify-content-center">
            <div class="w-8/12 bg-white p-6 rounded-lg">
                <h> New Configuration : </h>
                <form action="{{route('add.config')}}" method="post">

				    @csrf
					<label for="key">Enter Key :</label>
					<input type="text" id="key" name="key">

					<label for="value">Enter Value :</label>
					<input type="text" id="value" name="value" >

					<button type="submit"> Save </button>
				</form>
            </div>
          </div>
    </main>
@endsection