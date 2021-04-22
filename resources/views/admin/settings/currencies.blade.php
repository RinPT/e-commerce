@extends('layouts.admin.main')

@section('styles')

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/pnotify/pnotify.custom.css" />

@endsection

@section('breadcrumb')
    <h2>Currencies</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>All Currencies</span></li>
            <li><span>Currencies</span></li>
            <li><span>Dashboard</span></li>
        </ol>
    </div>
@endsection

@section('content')
    @if(session('status'))
        <div class="row mb-3">
            <div class="col">
                <div class="alert alert-info mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Info!</strong> {{ session('status') }}
                </div>
            </div>
        </div>
    @elseif($errors->any())
        <div class="row mb-3">
            <div class="col">
                <div class="alert alert-warning mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Warning!</strong> There is a problem. Update failed!
                </div>
            </div>
        </div>
    @elseif(session('destroy'))
        <div class="row mb-3">
            <div class="col">
                <div class="alert alert-danger mb-0">
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
                        <th>Code</th>
                        <th>Prefix</th>
                        <th>Suffix</th>
                        <th>Rate</th>
                        <th>Status</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($currencies->count())
                        @foreach ($currencies as $currency)
                            <tr data-item-id="{{ $currency->id }}">
                                <td>{{ $currency->id }}</td>
                                <form>@csrf<td>{{ $currency->name }}</td><form>
                                <td>{{ $currency->code }}</td>
                                <td>{{ $currency->prefix }}</td>
                                <td>{{ $currency->suffix }}</td>
                                <td>{{ $currency->rate }}</td>
                                <td>{{ $currency->status }}</td>
                                <td>{{ $currency->updated_at->format('d/m/Y') }}</td>
                                <td class="actions">
                                    <a href="#currencyEdit{{ $currency->id }}" class="modal-with-zoom-anim ws-normal btn btn-link text-primary"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('admin.currency.delete', $currency->id) }}" class="btn btn-link text-danger"><i class="far fa-trash-alt"></i></a>

                                    <!-- Modal Animation -->
									<div id="currencyEdit{{ $currency->id }}" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Update Currency</h2>
											</header>
											<div class="card-body">
                                                <form action="{{ route('admin.currency.update', $currency->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-wrapper mb-0">
                                                        <div class="form-group row @error('name') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Name</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="name" class="form-control" id="inputDefault" value="{{ $currency->name }}">
                                                                @error('name') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row @error('code') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Code</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="code" class="form-control" id="inputDefault" value="{{ $currency->code }}">
                                                                @error('code') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row @error('prefix') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Prefix</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="prefix" class="form-control" id="inputDefault" value="{{ $currency->prefix }}">
                                                                @error('prefix') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row @error('suffix') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Suffix</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="suffix" class="form-control" id="inputDefault" value="{{ $currency->suffix }}">
                                                                @error('suffix') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row @error('rate') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Rate</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="rate" class="form-control" id="inputDefault" value="{{ $currency->rate }}">
                                                                @error('rate') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row @error('status') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Status</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="status" class="form-control" id="inputDefault" value="{{ $currency->status }}">
                                                                @error('status') <p class="text-danger mb-0">{{ $message }}</p> @enderror
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
    <script src="/admin/vendor/select2/js/select2.js"></script>
    <script src="/admin/vendor/pnotify/pnotify.custom.js"></script>
@endsection

@section('end-scripts')
    <script src="/admin/js/examples/examples.datatables.default.js"></script>
    <script src="/admin/js/examples/examples.datatables.row.with.details.js"></script>
    <script src="/admin/js/examples/examples.datatables.tabletools.js"></script>
    <script src="/admin/js/examples/examples.modals.js"></script>
@endsection
