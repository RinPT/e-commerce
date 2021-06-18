@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
@endsection

@section('content')


@if($logged_author_gtype == "admin")
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card-body py-4">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3 class="text-4-1 my-0">Total Orders</h3>
                        <strong class="text-6 text-color-dark">{{ $order_count }}</strong>
                    </div>
                    <div class="col-6 text-left text-md-right pr-md-4 mt-4 mt-md-0">
                        <i class="bx bx-cart-alt icon icon-inline icon-xl bg-dark rounded-circle text-color-grey"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card-body py-4">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3 class="text-4-1 my-0">Total Products</h3>
                        <strong class="text-6 text-color-dark">{{ $product_count }}</strong>
                    </div>
                    <div class="col-6 text-left text-md-right pr-md-4 mt-4 mt-md-0">
                        <i class="bx bx-grid-alt icon icon-inline icon-xl bg-dark rounded-circle text-color-grey"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card-body py-4">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3 class="text-4-1 my-0">Total Tickets</h3>
                        <strong class="text-6 text-color-dark">{{ $ticket_count }}</strong>
                    </div>
                    <div class="col-6 text-left text-md-right pr-md-4 mt-4 mt-md-0">
                        <i class="bx bx-support icon icon-inline icon-xl bg-dark rounded-circle text-color-grey"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card-body py-4">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3 class="text-4-1 my-0">Total Income</h3>
                        <strong class="text-6 text-color-dark">{{ $order_income }}</strong>
                    </div>
                    <div class="col-6 text-left text-md-right pr-md-4 mt-4 mt-md-0">
                        <i class="bx bx-money icon icon-inline icon-xl bg-dark rounded-circle text-color-grey"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4 pt-0">
        <div class="col-lg-4">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h2 class="card-title">Store Orders</h2>
                </header>
                <div class="card-body" style="overflow-x: auto;">
                    <table class="table table-bordered table-striped mb-0 datatable-tabletools">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name - Surname</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }} - {{ $order->surname }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    <a href="" class="btn btn-dark btn-sm"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h2 class="card-title">Store Products</h2>
                </header>
                <div class="card-body" style="overflow-x: auto;">
                    <table class="table table-bordered table-striped mb-0 datatable-tabletools">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name </th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Creation Date</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }} - {{ $order->surname }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    <a href="" class="btn btn-dark btn-sm"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h2 class="card-title">Store Tickets</h2>
                </header>
                <div class="card-body" style="overflow-x: auto;">
                    <table class="table table-bordered table-striped mb-0 datatable-tabletools">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Creation Date</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }} - {{ $order->surname }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    <a href="" class="btn btn-dark btn-sm"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endif

    <section class="card card-modern card-big-info">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2-5 col-xl-1-5">
                    <i class="card-big-info-icon bx bx-pencil"></i>
                    <h2 class="card-big-info-title">Update Store</h2>
                    <p class="card-big-info-desc">You can update store by changing the information below.</p>
                </div>
                <div class="col-lg-3-5 col-xl-4-5">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul class="list-unstyled mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Success</strong> {{ Session::get('success') }}
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Error!</strong> {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.store.update',$id) }}" class="form-horizontal form-bordered mt-5" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store Name</label>
                            <div class="col-lg-6">
                                <input type="text" name="name" class="form-control" id="inputDefault" value="{{ $store->name }}" required>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Username</label>
                            <div class="col-lg-6">
                                <input type="text" name="username" class="form-control" id="inputDefault" value="{{ $store->username }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Email</label>
                            <div class="col-lg-6">
                                <input type="text" name="email" class="form-control" id="inputDefault" value="{{ $store->email }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Password</label>
                            <div class="col-lg-6">
                                <input type="text" name="password" class="form-control" id="inputDefault" placeholder="Leave blank if you won't change password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store Logo</label>
                            <div class="col-lg-6">
                                <input type="file" name="logo" class="form-control" id="inputDefault">
                                @if(!empty($store->logo))
                                    <img src="/photo/store/{{ $store->logo }}" width="200" class="thumbnail mt-2">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store URL</label>
                            <div class="col-lg-6">
                                <input type="text" name="url" class="form-control" id="inputDefault" value="{{ $store->url }}" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Tax No</label>
                            <div class="col-lg-6">
                                <input type="text" name="tax_no" class="form-control" id="inputDefault" value="{{ $store->tax_no }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Category of the Products</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="product_cat_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($store->product_cat_id == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Country</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="country_id">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" @if($store->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">City</label>
                            <div class="col-lg-6">
                                <input type="text" name="city" class="form-control" id="inputDefault" value="{{ $store->city }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Address</label>
                            <div class="col-lg-6">
                                <textarea type="text" name="address" class="form-control" rows="7" id="inputDefault" required>{{ $store->address }}</textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Phone</label>
                            <div class="col-lg-6">
                                <input type="text" name="phone" class="form-control" id="inputDefault" value="{{ $store->phone }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Active?</label>
                            <div class="col-lg-6">
                                <div class="switch switch-md switch-dark">
                                    <input type="checkbox" name="status" data-plugin-ios-switch @if($store->status) checked @endif/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row text-center">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault"></label>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-dark">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="/admin/vendor/ios7-switch/ios7-switch.js"></script>
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
    <script>
        var $table = $('.datatable-tabletools');

        var table = $table.dataTable();
    </script>
@endsection
