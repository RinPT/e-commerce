@extends('layouts.admin.main')
@section('content')

            <main>
                <div class="justify-content-center">
                    <div class="w-8/12 p-6 rounded-lg">
                        <h> New Permission : </h>
                        <form action="{{route('add.perm')}}" method="post">
                            @csrf
                            <div style="width:50%; display: block; padding-left: 25%;">
                            <label for="name ">Enter Permission Name :</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <span class="input-group-append">
                                <button class="btn btn-success" type="submit">Go</button>
                            </span>
                        </form>
                    </div>
                  </div>
            </main>

@endsection
