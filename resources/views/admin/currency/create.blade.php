@extends('layouts.admin.main')

@section('styles')

    <link rel="stylesheet" href="/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

@endsection

@section('breadcrumb')
    <h2>Currencies</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>Add New Currency</span></li>
            <li><span>Currencies</span></li>
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
    @endif
    <div class="row">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5">
                            <i class="card-big-info-icon fas fa-money-bill-alt"></i>
                            <h2 class="card-big-info-title">Add New Currency</h2>
                            <p class="card-big-info-desc">Add here all details and necessary information.</p>
                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <form class="form-horizontal form-bordered" action="{{ route('admin.currency.create') }}" method="POST">
                                @csrf
                                <div class="form-group row @error('name') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Name</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="name" class="form-control" id="inputDefault" value="{{ old('name') }}">
                                        @error('name') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group row @error('code') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Code</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="code" class="form-control" id="inputDefault" value="{{ old('code') }}">
                                        @error('code') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group row @error('prefix') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Prefix</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="prefix" class="form-control" id="inputDefault" value="{{ old('prefix') }}">
                                        @error('prefix') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group row @error('suffix') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Suffix</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="suffix" class="form-control" id="inputDefault" value="{{ old('suffix') }}">
                                        @error('suffix') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group row @error('rate') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Rate</label>
                                    <div class="col-lg-6">
                                        <input type="number" name="rate" class="form-control" id="inputDefault" step=".01" value="{{ old('rate') }}">
                                        @error('rate') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group row @error('status') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Status</label>
                                    <div class="col-lg-6">
                                        <div class="switch switch-md switch-dark">
                                            <input type="checkbox" name="status" data-plugin-ios-switch/>
                                        </div>
                                        @error('status') <p class="text-danger mb-0">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group row @error('base') has-danger @enderror">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Is base currency ?</label>
                                    <div class="col-lg-6">
                                        <div class="switch switch-md switch-dark">
                                            <input type="checkbox" name="base" data-plugin-ios-switch/>
                                        </div>
                                        @error('base') <p class="text-danger mb-0">{{ $message }}</p> @enderror
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
@endsection
