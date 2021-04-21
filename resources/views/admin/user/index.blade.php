@extends('layouts.admin.main')

@section('custom-styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
@endsection

@section('content')
    <section class="card">
        <header class="card-header">
            <div class="card-actions">
                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
            </div>

            <h2 class="card-title">All Users</h2>
            <p class="card-subtitle">You can see all the users below.</p>
        </header>
        <div class="card-body">
            <table class="table table-bordered table-striped mb-0" id="datatable-custom">
                <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Gender</th>
                    <th>Group</th>
                    <th>Store</th>
                    <th>Status</th>
                    <th>Last Logged IP Address</th>
                </tr>
                </thead>
                <tbody>
                @if($users->count())
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user ->id}}</td>
                            <td>{{$user -> name}}</td>
                            <td>{{$user -> surname}}</td>
                            <td>{{$user -> username}}</td>
                            <td>{{$user -> email}}</td>
                            <td>{{$user -> gender}}</td>
                            <td>{{$user -> group}}</td>
                            <td>{{$user -> store}}</td>
                            <td>{{$user -> status}}</td>
                            <td>{{$user -> last_logged_ipaddress}}</td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                    {{ method_field('GET') }}
                                    <button type="submit" class="btn btn-success btn-sm" style="font-size: 12px"><i class="fas fa-pencil-alt"></i></button>
                                </form>
                                <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="font-size: 12px"><i class="fas fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </section>

@endsection

@section('custom-scripts')
    <!-- Specific Page Vendor -->
    <script src="/admin/vendor/select2/js/select2.js"></script>
    <script src="/admin/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/admin/vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
    <script src="/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
    <script src="/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
    <script src="/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
    <script src="/admin/vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
    <script src="/admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
    <script src="/admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>
@endsection
