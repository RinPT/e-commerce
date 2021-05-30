@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Store Requests</h2>
                    <p class="card-subtitle">You can see all available store application requests below.</p>
                </header>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul class="list-unstyled mb-0">
                                @foreach ($errors->all() as $error)
                                    <li class="text-white">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('updated'))
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Updated</strong> {{ Session::get('updated') }}
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Error!</strong> {{ Session::get('error') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Store Name</th>
                            <th>Email</th>
                            <th>Store URL </th>
                            <th>Tax No </th>
                            <th>Country</th>
                            <th>Status</th>
                            <th>Submission Date</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($store_requests as $store_request)
                                <tr>
                                    <td>{{ $store_request->id }}</td>
                                    <td>{{ $store_request->name }}</td>
                                    <td>{{ $store_request->email }}</td>
                                    <td>@if(empty($store_request->url)) - @else {{ $store_request->url }} @endif</td>
                                    <td>{{ $store_request->tax_no }}</td>
                                    <td>{{ $store_request->country }}</td>
                                    <td>
                                        @if($store_request->status == 'waiting')
                                            <span class="badge badge-warning">Waiting</span>
                                        @elseif($store_request->status == 'rejected')
                                            <span class="badge badge-danger">Rejected</span>
                                        @elseif($store_request->status == 'accepted')
                                            <span class="badge badge-success">Accepted</span>
                                        @endif
                                    </td>
                                    <td>{{ is_null($store_request->created_at) ? "-" : Carbon\Carbon::parse($store_request->created_at)->format('d.m.Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.store.accept',$store_request->id) }}" class="btn btn-success btn-sm"><i class='fas fa-check'></i></a>
                                        <a href="#reject_request{{ $store_request->id }}" class="modal-with-zoom-anim ws-normal btn btn-dark btn-sm"><i class="fas fa-ban"></i></a>
                                        <a href="{{ route('admin.store.destroy_request',$store_request->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        <a href="#store_request{{ $store_request->id }}" class="modal-with-zoom-anim ws-normal btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>

                                        <!-- Update Modal Animation -->
                                        <div id="store_request{{ $store_request->id }}" class="zoom-anim-dialog modal-block-lg modal-block-primary mfp-hide">
                                            <section class="card">
                                                <header class="card-header">
                                                    <h2 class="card-title">Update Store Request</h2>
                                                </header>
                                                <div class="card-body">
                                                    <form action="{{ route('admin.store.update_request', $store_request->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-wrapper mb-0">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group row @error('name') has-danger @enderror">
                                                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Name</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" name="name" class="form-control" id="inputDefault" value="{{ $store_request->name }}">
                                                                            @error('name') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row @error('username') has-danger @enderror">
                                                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Username</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" name="username" class="form-control" id="inputDefault" value="{{ $store_request->username }}">
                                                                            @error('username') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row @error('email') has-danger @enderror">
                                                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Email</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" name="email" class="form-control" id="inputDefault" value="{{ $store_request->email }}">
                                                                            @error('email') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row @error('logo') has-danger @enderror">
                                                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Logo</label>
                                                                        <div class="col-lg-6">
                                                                            <img src="{{ $store_request->log }}" alt="" class="logo">
                                                                            @error('logo') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row @error('url') has-danger @enderror">
                                                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">URL</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" name="url" class="form-control" id="inputDefault" value="{{ $store_request->url }}">
                                                                            @error('url') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row @error('tax_no') has-danger @enderror">
                                                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Tax No:</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" name="tax_no" class="form-control" id="inputDefault" value="{{ $store_request->tax_no }}">
                                                                            @error('tax_no') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row @error('country_id') has-danger @enderror">
                                                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Country</label>
                                                                        <div class="col-lg-6">
                                                                            <select name="country_id" data-plugin-selectTwo class="form-control populate">
                                                                                <optgroup label="Categories">
                                                                                    @if ($countries->count())
                                                                                        @foreach ($countries as $country)
                                                                                            <option value="{{ $country->id }}" @if($store_request->country_id === $country->id) selected @endif>{{ $country->name }}</option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </optgroup>
                                                                            </select>
                                                                            @error('country_id') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group row @error('product_cat_id') has-danger @enderror">
                                                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Product Category:</label>
                                                                        <div class="col-lg-6">
                                                                            <select name="product_cat_id" data-plugin-selectTwo class="form-control populate">
                                                                                <optgroup label="Categories">
                                                                                    @if ($header_categories->count())
                                                                                        @foreach ($header_categories as $categories)
                                                                                        <option value="{{ $categories->id }}" @if($store_request->category === $categories->id) selected @endif>{{ $categories->name }}</option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </optgroup>
                                                                            </select>
                                                                            @error('product_cat_id') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row @error('city') has-danger @enderror">
                                                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">City:</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" name="city" class="form-control" id="inputDefault" value="{{ $store_request->city }}">
                                                                            @error('city') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row @error('address') has-danger @enderror">
                                                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Address:</label>
                                                                        <div class="col-lg-6">
                                                                            <textarea name="address" class="form-control" rows="3" id="textareaAutosize" data-plugin-textarea-autosize>{{ $store_request->address }}</textarea>
                                                                            @error('address') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row @error('phone') has-danger @enderror">
                                                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Phone:</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" name="phone" class="form-control" id="inputDefault" value="{{ $store_request->phone }}">
                                                                            @error('phone') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row @error('notes') has-danger @enderror">
                                                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Notes:</label>
                                                                        <div class="col-lg-6">
                                                                            <textarea name="notes" class="form-control" rows="3" id="textareaAutosize" data-plugin-textarea-autosize>{{ $store_request->notes }}</textarea>
                                                                            @error('notes') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row @error('status') has-danger @enderror">
                                                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Status:</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" name="status" class="form-control" id="inputDefault" value="{{ $store_request->status }}">
                                                                            @error('status') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row @error('created_at') has-danger @enderror">
                                                                        <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Date:</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" name="created_at" class="form-control" readonly="readonly" id="inputDefault" value="{{ $store_request->created_at->format('d-m-Y') }}">
                                                                            @error('created_at') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
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

                                        <!-- Ban Modal Animation -->
                                        <div id="reject_request{{ $store_request->id }}" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                                            <section class="card">
                                                <header class="card-header">
                                                    <h2 class="card-title">Ban Request</h2>
                                                </header>
                                                <div class="card-body">
                                                    <form action="{{ route('admin.store.reject_request', $store_request->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-wrapper mb-0">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group row @error('notes') has-danger @enderror">
                                                                        <label class="col-lg-2 control-label text-lg-right pt-2" for="inputDefault">Notes:</label>
                                                                        <div class="col-lg-10">
                                                                            <textarea name="notes" class="form-control" rows="3" id="textareaAutosize" data-plugin-textarea-autosize>{{ $store_request->notes }}</textarea>
                                                                            @error('notes') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                        <div class="row">
                                                            <div class="col-md-12 text-right">
                                                                <button type="submit" class="btn btn-dark">Ban</button>
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
        </div>
    </div>

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
    <script src="/admin/vendor/autosize/autosize.js"></script>
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
    <script src="/admin/js/examples/examples.modals.js"></script>
@endsection
