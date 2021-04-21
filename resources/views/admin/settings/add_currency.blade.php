@extends('layouts.admin.main')

@section('styles')

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />

@endsection

@section('breadcrumb')
    <h2>Currencies</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>Add New Currencies</span></li>
            <li><span>Currencies</span></li>
            <li><span>Dashboard</span></li>
        </ol>
    </div>
@endsection

@section('content')
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Default</h2>
        </header>
        <div class="card-body">
            <table class="table table-bordered table-striped mb-0" id="datatable-editable">
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
                    <tr data-item-id="1">
                        <td>1</td>
                        <td>Pound</td>
                        <td>GBP</td>
                        <td>£</td>
                        <td>£</td>
                        <td>10 amk</td>
                        <td>Don't know</td>
                        <td>21/04/2021</td>
                        <td class="actions">
                            <a href="#" class="hidden on-editing save-row"><i class="fas fa-save"></i></a>
                            <a href="#" class="hidden on-editing cancel-row"><i class="fas fa-times"></i></a>
                            <a href="#" class="on-default edit-row"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="on-default remove-row"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection

@section('custom-scripts')
    <!-- Specific Page Vendor -->
    <script src="/admin/vendor/select2/js/select2.js"></script>
    <script src="/admin/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/admin/vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
@endsection

@section('end-scripts')
    <script src="/admin/js/examples/examples.datatables.editable.js"></script>
@endsection
