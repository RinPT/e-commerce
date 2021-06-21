@extends('layouts.admin.main')

@section('styles')

    <link rel="stylesheet" href="/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
    <link rel="stylesheet" href="/admin/vendor/pnotify/pnotify.custom.css" />
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />

@endsection

@section('breadcrumb')
    <h2>Ticket Management</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>Create Ticket Department</span></li>
            <li><span>Ticket Management</span></li>
            <li><span>Dashboard</span></li>
        </ol>
    </div>
@endsection

@section('content')
    @if(session('created'))
        <div class="row mb-3">
            <div class="col">
                <div class="alert alert-success mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Created!</strong> {{ session('created') }}.
                </div>
            </div>
        </div>
    @elseif(session('updated'))
        <div class="row mb-3">
            <div class="col">
                <div class="alert alert-info mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Updated!</strong> {{ session('updated') }}.
                </div>
            </div>
        </div>
    @elseif(session('deleted'))
        <div class="row mb-3">
            <div class="col">
                <div class="alert alert-danger mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Deleted!</strong> {{ session('deleted') }}.
                </div>
            </div>
        </div>
    @endif
    <section class="card mb-5">
        <header class="card-header">
            <h2 class="card-title">Ticket Departments</h2>
            <p class="card-subtitle">You can see all departments below.</p>
        </header>
        <div class="card-body">
            <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Descriptions</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($departments->count())
                        @foreach ($departments as $department)
                            <tr data-item-id="{{ $department->id }}">
                                <td>{{ $department->id }} </td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->description }}</td>
                                <td>
                                    @if($department->status === 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-warning">Not Active</span>
                                    @endif

                                </td>
                                <td>{{ date('d/m/Y', strtotime($department->created_at)) }}</td>
                                <td class="actions d-flex">
                                    <a href="#departmentEdit{{ $department->id }}" class="modal-with-zoom-anim ws-normal btn btn-success btn-sm text-white"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('admin.ticket.department.delete', $department->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                                    </form>

                                    <!-- Modal Animation -->
									<div id="departmentEdit{{ $department->id }}" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Update Ticket Department</h2>
											</header>
											<div class="card-body">
                                                <form action="{{ route('admin.ticket.department.update', $department->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-wrapper mb-0">
                                                        <div class="form-group row @error('name') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Department Name</label>
                                                            <div class="col-lg-6">
                                                                <input name="name" type="text" class="form-control" id="inputDefault" value="{{ $department->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row @error('description') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Description</label>
                                                            <div class="col-lg-6">
                                                                <textarea class="form-control" name="description" rows="3" id="textareaAutosize" data-plugin-textarea-autosize>{{ $department->description }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row @error('status') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Active?</label>
                                                            <div class="switch switch-dark">
                                                                <input type="checkbox" name="status" value="1" data-plugin-ios-switch @if($department->status === 1) checked @endif>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr/>
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

    <div class="row">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon fas fa-address-card"></i>
                            <h2 class="card-big-info-title">Add New Ticket Department</h2>
                            <p class="card-big-info-desc">Add here all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <form class="form-horizontal form-bordered" action="{{ route('admin.ticket.department.store') }}" method="POST">
                                @csrf
                                <div class="form-group row @error('name') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Department Name</label>
                                    <div class="col-lg-6">
                                        <input name="name" type="text" class="form-control" id="inputDefault" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="form-group row @error('description') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Description</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" name="description" rows="3" id="textareaAutosize" data-plugin-textarea-autosize></textarea>
                                    </div>
                                </div>
                                <div class="form-group row @error('status') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Active?</label>
                                    <div class="switch switch-dark">
                                        <input type="checkbox" name="status" value="1" data-plugin-ios-switch />
                                    </div>
                                </div>
                                <div class="form-group row d-flex justify-content-center">
                                    <button type="submit" class="btn btn-dark">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/admin/vendor/ios7-switch/ios7-switch.js"></script>
    <script src="/admin/vendor/autosize/autosize.js"></script>
    <script src="/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
    <script src="/admin/vendor/select2/js/select2.js"></script>
    <script src="/admin/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
    <script src="/admin/vendor/fuelux/js/spinner.js"></script>
    <script src="/admin/vendor/pnotify/pnotify.custom.js"></script>
@endsection

@section('end-scripts')
    <script src="/admin/js/examples/examples.modals.js"></script>
@endsection
