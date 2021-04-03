@extends('layouts.admin.main')
@section('content')

            <main class="mt-3">
                <div class=" justify-content-center">
                    <div class="w-8/12 p-6 rounded-lg" style="display: block; width: 50%; padding-left: 25%;">
                        <h> New Configuration : </h>
                        <form action="{{route('add.config')}}" method="post">

                            @csrf

                            <label for="key">Enter Key :</label>
                            <input type="text" class="form-control" id="key" name="key">

                            <label for="value">Enter Value :</label>
                            <input type="text" class="form-control" id="value" name="value">

                            <span class="input-group-append">
                                <button class="btn btn-success" type="submit">Save</button>
                            </span>

                        </form>
                    </div>
                  </div>
            </main>
@endsection
