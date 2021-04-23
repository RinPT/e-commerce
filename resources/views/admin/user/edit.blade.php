@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
@endsection

@section('content')
    @if(session('status'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> {{ session('status') }}
                </div>
            </div>
        </div>
    @endif

    <section class="card ">
        <header class="card-header">
            <div class="card-actions">
                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
            </div>

            <h2 class="card-title">Edit a User</h2>
            <p class="card-subtitle">You can edit a user here.</p>
        </header>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('admin.user.update', $editUser->id) }}" method="POST" class="form" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2" >Name</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="inputDefault" name="name" value="{{ $editUser->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">Surname</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="inputDefault" name="surnamename" value="{{ $editUser->surname }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">Username</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="inputDefault" name="username" value="{{ $editUser->username }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">E-mail</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="inputDefault" name="email" value="{{ $editUser->email }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">Gender</label>
                        <select class="form-control row" name="gender">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>



                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">Status</label>
                        <div class="col-lg-6">
                            <select class="form-control mb-3" name="status">
                                <option>0</option>
                                <option>1</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">Group</label>
                        <div class="col-lg-6">
                            <select class="form-control mb-3" name="group">
                                @foreach ($groups as $group)
                                    @if($group->name != $editUser->group)
                                        <option value="{{ $group->id }}" {{ ($group->name == $editUser->name) ? 'selected' : '' }}>{{ $group->name }} {{ ($group->name == $editUser->group) ? '(Current Option)' : '' }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault"></label>
                        <div class="col-lg-6 text-center">
                            <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i>Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="/admin/vendor/ios7-switch/ios7-switch.js"></script>
    <script src="/admin/vendor/select2/js/select2.js"></script>
@endsection

