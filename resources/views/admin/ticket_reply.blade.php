@extends('layouts.admin.main')

@section('content')
    <main class="mt-3">
        <div class="d-flex justify-content-center">
            <div class="w-8/12 bg-white p-6 rounded-lg">
                <h> Your Reply : </h>
                <form action="{{route('ticket.reply',$tickets)}}" method="post">

				    @csrf
					<label for="attachment">Select a file:</label>
					<input type="file" id="attachment" name="attachment">

					<label for="rate">Rate :</label>
					<input type="number" id="rate" name="rate" >

					<button type="submit"> Send </button>
				</form>
            </div>
          </div>
    </main>
@endsection
