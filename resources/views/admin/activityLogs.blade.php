@extends('layouts.admin.main')
@section('content')

    <main>
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                    </div>
                    <h2 class="card-title">Activity Logs</h2>
                </header>
                <div class="card-body">
                    <table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
                        @if($activity_logs->count())
                        <table style="width:100%">
                            <tr>
                                <th>Log ID</th>
                                <th>User ID</th>
                                <th>Username</th>
                                <th>Author ID</th>
                                <th>Description </th>
                                <th> IP Address</th>
                                <th> Options </th>
                            </tr>
                            @foreach($activity_logs as $activity_logs)
                                <tr>
                                    <td> {{$activity_logs->log_id}} </td>
                                    <td> {{$activity_logs->user_id}} </td>
                                    <td> {{$activity_logs->username}} </td>
                                    <td> {{$activity_logs->author_id}} </td>
                                    <td> {{$activity_logs->description}} </td>
                                    <td> {{$activity_logs->ip_address}} </td>
                                    <td>
                                    <form action="{{route('delete.activity_log',$activity_logs)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="text-blue-500">Delete This Log</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                @else
                    <p> There are no activities yet. </p>
                @endif
                    </table>
                </div>
            </section>
        </div>
    </main>
@endsection
