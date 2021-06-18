@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
@endsection

@section('content')
    <section class="card card-modern card-big-info">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2-5 col-xl-1-5">
                    <i class="card-big-info-icon bx bx-pencil"></i>
                    <h2 class="card-big-info-title">Update Order</h2>
                    <p class="card-big-info-desc">You can update order by changing the information below.</p>
                </div>
                <div class="col-lg-3-5 col-xl-4-5">
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
                    <form action="{{ route('admin.order.update',$id) }}" class="form-horizontal form-bordered mt-5" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store ID</label>
                            <div class="col-lg-6">
                                <input type="text" name="store_id" class="form-control" id="inputDefault" value="{{ $order->store_id }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store Name</label>
                            <div class="col-lg-6">
                                <input type="text" name="store_name" class="form-control" id="inputDefault" value="{{ $order->store_name }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store Url</label>
                            <div class="col-lg-6">
                                <input type="text" name="store_url" class="form-control" id="inputDefault" value="{{ $order->store_url }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">User ID</label>
                            <div class="col-lg-6">
                                <input type="text" name="user_id" class="form-control" id="inputDefault" value="{{ $order->user_id }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">User Type</label>
                            <div class="col-lg-6">
                                <input type="text" name="user_type" list="user_type" class="form-control" id="inputDefault" value="{{ $order->user_type }}" required>

                                <datalist id="user_type">
                                    <option value="individual">
                                    <option value="institutional">
                                </datalist>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">User Name</label>
                            <div class="col-lg-6">
                                <input type="text" name="name" class="form-control" id="inputDefault" value="{{ $order->name }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">User Surname</label>
                            <div class="col-lg-6">
                                <input type="text" name="surname" class="form-control" id="inputDefault" value="{{ $order->surname }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">User Username</label>
                            <div class="col-lg-6">
                                <input type="text" name="username" class="form-control" id="inputDefault" value="{{ $order->name }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Email</label>
                            <div class="col-lg-6">
                                <input type="text" name="email" class="form-control" id="inputDefault" value="{{ $order->email }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Gender</label>
                            <div class="col-lg-6">
                                <input type="text" name="gender" list="gender" class="form-control" id="inputDefault" value="{{ $order->gender }}" required>

                                <datalist id="gender">
                                    <option value="male">
                                    <option value="female">
                                    <option value="other">
                                </datalist>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Comment</label>
                            <div class="col-lg-6">
                                <input type="text" name="comment" class="form-control" id="inputDefault" value="{{ $order->comment }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Total</label>
                            <div class="col-lg-6">
                                <input type="text" name="total" class="form-control" id="inputDefault" value="{{ $order->total }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Order Status</label>

                            <div class="col-lg-6">
                                <input type="text" name="order_status" list="order_status" class="form-control" id="inputDefault" value="{{ $order->order_status }}" required>

                                <datalist id="order_status">
                                    <option value="waiting">
                                    <option value="approved">
                                    <option value="canceled">
                                </datalist>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Currency Code</label>
                            <div class="col-lg-6">
                                <input type="text" name="currency_code" class="form-control" id="inputDefault" value="{{ $order->currency_code }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">IP Address</label>
                            <div class="col-lg-6">
                                <input type="text" name="ip_address" class="form-control" id="inputDefault" value="{{ $order->ip_address }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">User Agent</label>
                            <div class="col-lg-6">
                                <input type="text" name="user_agent" class="form-control" id="inputDefault" value="{{ $order->user_agent }}" required>
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
@endsection


