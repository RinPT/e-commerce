@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
@endsection

@section('content')
    @if(session('destroy'))
        <div class="row">
            <div class="col">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Deleted!</strong> {{ session('destroy') }}
                </div>
            </div>
        </div>
    @endif
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Currencies</h2>
        </header>
        <div class="card-body">
            <table class="table table-bordered table-striped mb-0" id="datatable-default">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Gender</th>
                        <th>Group</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users->count())
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->surname}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->gender}}</td>
                                <td>{{$user->group}}</td>
                                <td>{{$user->status}}</td>
                                <td class="actions d-flex">
                                    <a href="#" class="modal-with-zoom-anim ws-normal btn btn-link text-primary"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger"><i class="far fa-trash-alt"></i></button>
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

@section('end-scripts')
    <script src="/admin/js/examples/examples.datatables.default.js"></script>
    <script src="/admin/js/examples/examples.datatables.row.with.details.js"></script>
    <script src="/admin/js/examples/examples.datatables.tabletools.js"></script>
@endsection
