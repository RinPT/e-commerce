@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="/admin/vendor/pnotify/pnotify.custom.css" />
@endsection

@section('content')

@if(session('success'))
    <div class="row">
        <div class="col">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Success!</strong> {{ session('success') }}
            </div>
        </div>
    </div>
    @elseif(session('destroy'))
        <div class="row">
            <div class="col">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Destroy!</strong> {{ session('destroy') }}
                </div>
            </div>
        </div>
    @elseif(session('emptyem'))
        <div class="row">
            <div class="col">
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Warning!</strong> {{ session('emptyem') }}
                </div>
            </div>
        </div>
    @elseif(session('emptyun'))
        <div class="row">
            <div class="col">
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Warning!</strong> {{ session('emptyun') }}
                </div>
            </div>
        </div>
    @endif
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Users</h2>
        </header>
        <div class="card-body">
            <table class="table table-bordered table-striped mb-0" id="datatable-default">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>USername</th>
                        <th>Email</th>
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
                                <td class="actions">
                                    <a href="#userEdit{{$user->id}}" class="mb-1 mt-1 mr-1 modal-with-zoom-anim ws-normal btn btn-link text-primary"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-link text-danger"><i class="far fa-trash-alt"></i></a>

                                    <!-- Modal Animation -->
                                    <div id="userEdit{{$user->id}}" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                                        <section class="card">
                                            <header class="card-header">
                                                <h2 class="card-title">Edit user</h2>
                                            </header>
                                            <div class="card-body">
                                                <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-wrapper mb-0">

                                                        <div class="form-group row @error('name') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" >Name</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="inputDefault" name="name" value="{{ $user->name }}">
                                                                @error('name') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row @error('surname') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2">Surname</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="inputDefault" name="surname" value="{{ $user->surname }}">
                                                                @error('surname') <p class="text-danger mb-0">{{ $message }}</p> @enderror

                                                            </div>
                                                        </div>

                                                        <div class="form-group row @error('username') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2">Username</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="inputDefault" name="username" value="{{ $user->username }}">
                                                                @error('username') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row @error('email') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2">E-mail</label>
                                                            <div class="col-lg-6">
                                                                <input type="email" class="form-control" id="inputDefault" name="email" value="{{ $user->email }}">
                                                                @error('email') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row ">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2">Gender</label>
                                                            <div class="col-lg-6">
                                                            <select class="form-control mb-3" name="gender">
                                                                <option selected disabled>Select an option</option>
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                                <option>Other</option>
                                                            </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2">Group</label>
                                                            <div class="col-lg-6">
                                                                <select class="form-control mb-3" name="group">
                                                                    @foreach ($groups as $group)
                                                                        @if($group->name != $user->group)
                                                                            <option value="{{ $group->id }}" {{ ($group->name == $user->name) ? 'selected' : '' }}>{{ $group->name }} {{ ($group->name == $user->group) ? '(Current Option)' : '' }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2">Status</label>
                                                            <div class="col-lg-6">
                                                                <select class="form-control mb-3" name="status">
                                                                    <option selected>0</option>
                                                                    <option>1</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <hr/>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 text-right">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            <button class="btn btn-default modal-dismiss">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </section>
                                    </div>

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
    <script src="/admin/vendor/pnotify/pnotify.custom.js"></script>

@endsection

@section('end-scripts')
    <script src="/admin/js/examples/examples.datatables.default.js"></script>
    <script src="/admin/js/examples/examples.datatables.row.with.details.js"></script>
    <script src="/admin/js/examples/examples.datatables.tabletools.js"></script>
    <script src="/admin/js/examples/examples.modals.js"></script>
@endsection
