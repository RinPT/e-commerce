@extends('layouts.admin.main')
@section('content')
            <main class="mt-3">
                <div class="justify-content-center">
                        <div class="w-8/12 p-6 rounded-lg" style="display: block; width: 50%; padding-left: 25%;">
                        <h> New Group : </h>
                        <form action="{{route('add.user_group')}}" method="post">

                            @csrf

                            <label for="name">Enter Group Name :</label>
                            <input type="text" class="form-control" id="name" name="name">

                            <label for="value">Enter Permissions :</label>
                            <input type="text" class="form-control" id="permissions" name="permissions">

                            <span class="input-group-append">
                                <button class="btn btn-success" type="submit">Save</button>
                            </span>

                        </form>
                    </div>
                  </div>
            </main>

@endsection
