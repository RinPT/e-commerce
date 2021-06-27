@extends('layouts.admin.main')

@section('styles')

    <link rel="stylesheet" href="/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />

@endsection

@section('breadcrumb')
    <h2>Discount Management</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>Store Discount</span></li>
            <li><span>Discount Management</span></li>
            <li><span>Dashboard</span></li>
        </ol>
    </div>
@endsection

@section('content')
    @if(session('status'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Notification!</strong> {{ session('status') }}.
                </div>
            </div>
        </div>
    @elseif(session('error'))
        <div class="row">
            <div class="col">
                <div class="alert alert-warning mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Whoops!</strong> {{ session('error') }}.
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon fas fa-money-bill-alt"></i>
                            <h2 class="card-big-info-title">Add New Discount</h2>
                            <p class="card-big-info-desc">Add here all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <form class="form-horizontal form-bordered" action="{{ route('store.discount.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputReadOnly">Store Name</label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $stores->name }}" id="inputReadOnly" class="form-control" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row @error('store_discount') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Store Discount</label>
                                    <div class="col-lg-6">
                                        <input name="store_discount" type="number" class="form-control" id="inputDefault" value="{{ old('store_discount') }}">
                                    </div>
                                </div>
                                <div class="form-group row @error('description') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="textareaAutosize">Description</label>
                                    <div class="col-lg-6">
                                        <textarea name="description" class="form-control" rows="3" id="textareaAutosize" data-plugin-textarea-autosize>{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">Start/End Date</label>
                                    <div class="col-lg-6">
                                        <div class="input-daterange input-group">
                                            <input type="date" class="form-control @error('start_date')is-invalid @enderror" name="start_date">
                                            <span class="input-group-text border-left-0 border-right-0 rounded-0">
                                                to
                                            </span>
                                            <input type="date" class="form-control @error('end_date')is-invalid @enderror" name="end_date">
                                        </div>
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
@endsection
