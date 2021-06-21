@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/pnotify/pnotify.custom.css" />
@endsection

@section('content')
    @if(session('updated'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> {{ session('success') }}
                </div>
            </div>
        </div>
    @elseif(session('destroy'))
        <div class="row mb-3">
            <div class="col">
                <div class="alert alert-info mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Deleted!</strong> {{ session('destroy') }}
                </div>
            </div>
        </div>
    @endif

    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Advertisements</h2>
        </header>
        <div class="card-body" style="overflow-x: auto;">
            <table class="table table-bordered table-striped mb-0" id="datatable-default">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Category ID</th>
                    <th>Image</th>
                    <th>Creation Date</th>
                    <th>Update Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($advertisements as $advertisement)
                    <tr>
                        <td>{{ $advertisement->id }}</td>
                        <td>{{ $advertisement->category_id }}</td>
                        <td> <img src="/photo/advertisement/{{ $advertisement->image }}" style="max-height: 160px;"></td>
                        <td>{{ is_null($advertisement->created_at) ? "-" : Carbon\Carbon::parse($advertisement->created_at)->format('d.m.Y H:i') }}</td>
                        <td>{{ is_null($advertisement->updated_at) ? "-" : Carbon\Carbon::parse($advertisement->updated_at)->format('d.m.Y H:i') }}</td>
                        <td class="actions">
                            <a href="#advertisementEdit{{$advertisement->id}}" class="mb-1 mt-1 mr-1 modal-with-zoom-anim ws-normal btn btn-link text-primary"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('admin.advertisement.delete', $advertisement->id) }}" class="btn btn-link text-danger"><i class="far fa-trash-alt"></i></a>

                            <!-- Modal Animation -->
                            <div id="advertisementEdit{{$advertisement->id}}" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                                <section class="card">
                                    <header class="card-header">
                                        <h2 class="card-title">Edit advertisement</h2>
                                    </header>
                                    <div class="card-body">
                                        <form action="{{ route('admin.advertisement.update', $advertisement->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-wrapper mb-0">

                                                <div class="form-group row @error('category_id') has-danger @enderror">
                                                    <label class="col-lg-3 control-label text-lg-right pt-2" >Category_ID</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="inputDefault" name="advertisement" value="{{ $advertisement->category_id }}">
                                                        @error('advertisement') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row @error('image') has-danger @enderror">
                                                    <label class="col-lg-3 control-label text-lg-right pt-2">Image</label>
                                                    <div class="col-lg-6">
                                                        <input type="file" class="form-control" id="inputDefault" name="image" value="{{ $advertisement->image }}">
                                                        @error('image') <p class="text-danger mb-0">{{ $message }}</p> @enderror
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
