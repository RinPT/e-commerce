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
    @elseif(session('error'))
    <div class="row">
        <div class="col">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Error!</strong> {{ session('error') }}
            </div>
        </div>
    </div>
    @endif
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Cargo</h2>
            <p class="card-subtitle">You can see all available countries below.</p>
        </header>
        <div class="card-body">
            <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                <thead>
                <tr>
                    <th>Country ID</th>
                    <th>Name</th>
                    <th>ISO Code</th>
                    <th>Status </th>
                    <th>Creation Date</th>
                    <th>Updation Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($countries as $country)
                        <tr>
                            <td>{{ $country->id }}</td>
                            <td>{{ $country->name }}</td>
                            <td>{{ $country->iso_code }}</td>
                            <td>{{ $country->status }}</td>
                            <td>{{ is_null($country->created_at) ? "-" : Carbon\Carbon::parse($country->created_at)->format('d.m.Y') }}</td>
                            <td>{{ is_null($country->updated_at) ? "-" : Carbon\Carbon::parse($country->updated_at)->format('d.m.Y') }}</td>
                            <td class="actions">
                                    <a href="#cargoEdit{{$country->id}}" class="mb-1 mt-1 mr-1 modal-with-zoom-anim ws-normal btn btn-link text-primary"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('admin.cargo.destroy', $country->id) }}" class="btn btn-link text-danger"><i class="far fa-trash-alt"></i></a>

                                    <!-- Modal Animation -->
                                    <div id="cargoEdit{{$country->id}}" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                                        <section class="card">
                                            <header class="card-header">
                                                <h2 class="card-title">Edit cargo</h2>
                                            </header>
                                            <div class="card-body">
                                                <form action="{{ route('admin.cargo.update', $country->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-wrapper mb-0">

                                                        <div class="form-group row @error('countryid') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" >Country ID</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="inputDefault" name="id" value="{{ $country->id }}">
                                                                @error('countryid') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row @error('name') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2" >Name</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="inputDefault" name="name" value="{{ $country->name }}">
                                                                @error('name') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row @error('isocode') has-danger @enderror">
                                                            <label class="col-lg-3 control-label text-lg-right pt-2">ISO Code</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="inputDefault" name="iso_code" value="{{ $country->iso_code }}">
                                                                @error('isocode') <p class="text-danger mb-0">{{ $message }}</p> @enderror

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
                </tbody>
            </table>
        </div>
    </section>
@endsection

@section('scripts')
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
