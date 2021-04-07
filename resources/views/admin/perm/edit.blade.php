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
                    <h2 class="card-big-info-title">Update Permission</h2>
                    <p class="card-big-info-desc">You can update permission by changing the information below.</p>
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
                    <form action="{{ route('admin.perm.update',$id) }}" class="form-horizontal form-bordered mt-5" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Name</label>
                            <div class="col-lg-6">
                                <input type="text" name="name" class="form-control" id="inputDefault" value="{{ $perm->name }}" required>
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


