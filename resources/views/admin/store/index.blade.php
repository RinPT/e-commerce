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
    @if(session('success'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> {{ session('success') }}
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
            <h2 class="card-title">Stores</h2>
        </header>
        <div class="card-body" style="overflow-x: auto;">
            <table class="table table-bordered table-striped mb-0" id="datatable-default">
                <thead>
                <tr>
                    <th>Store ID</th>
                    <th>Store Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Logo</th>
                    <th>Store URL </th>
                    <th>Tax No </th>
                    <th>Country ID </th>
                    <th>City </th>
                    <th>Address </th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Creation Date</th>
                    <th>Update Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($stores as $store)
                        <tr>
                            <td>{{ $store->id }}</td>
                            <td>{{ $store->name }}</td>
                            <td>{{ $store->username }}</td>
                            <td>{{ $store->email }}</td>
                            <td>{{ $store->password }}</td>
                            <td>{{ $store->logo }}</td>
                            <td>{{ $store->url }}</td>
                            <td>{{ $store->tax_no }}</td>
                            <td>{{ $store->country_id }}</td>
                            <td>{{ $store->city }}</td>
                            <td>{{ $store->address }}</td>
                            <td>{{ $store->phone }}</td>
                            <td>{{ $store->status }}</td>
                            <td>{{ is_null($store->created_at) ? "-" : Carbon\Carbon::parse($store->created_at)->format('d.m.Y H:i') }}</td>
                            <td>{{ is_null($store->updated_at) ? "-" : Carbon\Carbon::parse($store->updated_at)->format('d.m.Y H:i') }}</td>
                            <td class="actions">
                                <a href="#storeEdit{{$store->id}}" class="mb-1 mt-1 mr-1 modal-with-zoom-anim ws-normal btn btn-link text-primary"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{ route('admin.store.destroy', $store->id) }}" class="btn btn-link text-danger"><i class="far fa-trash-alt"></i></a>

                                <!-- Modal Animation -->
                                <div id="storeEdit{{$store->id}}" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                                    <section class="card">
                                        <header class="card-header">
                                            <h2 class="card-title">Edit store</h2>
                                        </header>
                                        <div class="card-body">
                                            <form action="{{ route('admin.store.update', $store->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-wrapper mb-0">

                                                    <div class="form-group row @error('name') has-danger @enderror">
                                                        <label class="col-lg-3 control-label text-lg-right pt-2" >Name</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="inputDefault" name="name" value="{{ $store->name }}">
                                                            @error('name') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row @error('username') has-danger @enderror">
                                                        <label class="col-lg-3 control-label text-lg-right pt-2">Username</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="inputDefault" name="username" value="{{ $store->username }}">
                                                            @error('username') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row @error('email') has-danger @enderror">
                                                        <label class="col-lg-3 control-label text-lg-right pt-2">E-mail</label>
                                                        <div class="col-lg-6">
                                                            <input type="email" class="form-control" id="inputDefault" name="email" value="{{ $store->email }}">
                                                            @error('email') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row @error('password') has-danger @enderror">
                                                        <label class="col-lg-3 control-label text-lg-right pt-2">Password</label>
                                                        <div class="col-lg-6">
                                                            <input type="email" class="form-control" id="inputDefault" name="password" value="{{ $store->password }}">
                                                            @error('password') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row @error('logo') has-danger @enderror">
                                                        <label class="col-lg-3 control-label text-lg-right pt-2">Logo</label>
                                                        <div class="col-lg-6">
                                                            <input type="file" class="form-control" id="inputDefault" name="logo" value="{{ $store->logo }}">
                                                            @error('logo') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row @error('url') has-danger @enderror">
                                                        <label class="col-lg-3 control-label text-lg-right pt-2">URL</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="inputDefault" name="url" value="{{ $store->url }}">
                                                            @error('url') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row @error('tax_no') has-danger @enderror">
                                                        <label class="col-lg-3 control-label text-lg-right pt-2">Tax No</label>
                                                        <div class="col-lg-6">
                                                            <input type="tax_no" class="form-control" id="inputDefault" name="tax_no" value="{{ $store->tax_no }}">
                                                            @error('tax_no') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row @error('country_no') has-danger @enderror">
                                                        <label class="col-lg-3 control-label text-lg-right pt-2">Country No</label>
                                                        <div class="col-lg-6">
                                                            <input type="email" class="form-control" id="inputDefault" name="country_no" value="{{ $store->country_no }}">
                                                            @error('country_no') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row @error('city') has-danger @enderror">
                                                        <label class="col-lg-3 control-label text-lg-right pt-2">City</label>
                                                        <div class="col-lg-6">
                                                            <input type="email" class="form-control" id="inputDefault" name="city" value="{{ $store->city }}">
                                                            @error('city') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row @error('address') has-danger @enderror">
                                                        <label class="col-lg-3 control-label text-lg-right pt-2">Address</label>
                                                        <div class="col-lg-6">
                                                            <input type="email" class="form-control" id="inputDefault" name="address" value="{{ $store->address }}">
                                                            @error('address') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row @error('phone') has-danger @enderror">
                                                        <label class="col-lg-3 control-label text-lg-right pt-2">Phone</label>
                                                        <div class="col-lg-6">
                                                            <input type="email" class="form-control" id="inputDefault" name="phone" value="{{ $store->phone }}">
                                                            @error('phone') <p class="text-danger mb-0">{{ $message }}</p> @enderror
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
    <script>
        var $table = $('#datatable-tabletools');

        var table = $table.dataTable({
            sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
            buttons: [
                {
                    extend: 'print',
                    text: 'Print'
                },
                {
                    extend: 'excel',
                    text: 'Excel'
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    customize : function(doc){
                        var colCount = new Array();
                        $('#datatable-tabletools').find('tbody tr:first-child td').each(function(){
                            if($(this).attr('colspan')){
                                for(var i=1;i<=$(this).attr('colspan');$i++){
                                    colCount.push('*');
                                }
                            }else{ colCount.push('*'); }
                        });
                        doc.content[1].table.widths = colCount;
                    }
                }
            ]
        });

        $('<div />').addClass('dt-buttons mb-2 pb-1 text-right').prependTo('#datatable-tabletools_wrapper');

        $table.DataTable().buttons().container().prependTo( '#datatable-tabletools_wrapper .dt-buttons' );

        $('#datatable-tabletools_wrapper').find('.btn-secondary').removeClass('btn-secondary').addClass('btn-default');
    </script>

    <script src="/admin/js/examples/examples.datatables.default.js"></script>
    <script src="/admin/js/examples/examples.datatables.row.with.details.js"></script>
    <script src="/admin/js/examples/examples.datatables.tabletools.js"></script>
    <script src="/admin/js/examples/examples.modals.js"></script>
@endsection
