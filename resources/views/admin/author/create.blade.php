@extends('layouts.admin.main')

@section('content')
    <section class="card">
        <header class="card-header">
            <div class="card-actions">
                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
            </div>

            <h2 class="card-title">Add New Author</h2>
            <p class="card-subtitle">You can add a new author filling below information.</p>
        </header>
        <div class="card-body">
            <form action="{{ route('admin.author.create') }}" class="form-horizontal form-bordered" method="post">
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Name</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="inputDefault">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Surname</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="inputDefault">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Username</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="inputDefault">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Email</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="inputDefault">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Password</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="inputDefault">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Groups</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="inputDefault">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Active?</label>
                    <div class="col-lg-6">
                        <div class="switch switch-md switch-dark">
                            <input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
                        </div>
                    </div>
                </div>
                <div class="form-group row text-center">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault"></label>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-dark"><i class='bx bx-plus-circle' style="font-size: 15px"></i> Add</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="/admin/vendor/ios7-switch/ios7-switch.js"></script>
@endsection


