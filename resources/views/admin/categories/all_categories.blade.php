@extends('layouts.admin.main')

@section('custom-styles')
<link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
<link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
<link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
@endsection

@section('content')
<section class="card">
    <header class="card-header">
        <div class="card-actions">
            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
        </div>

        <h2 class="card-title">All Categories</h2>
        <p class="card-subtitle">You can see all the categories below.</p>
    </header>
    <div class="card-body">
        <table class="table table-bordered table-striped mb-0" id="datatable-custom">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    {{-- <th>Image</th> --}}
                    <th>Meta Title</th>
                    {{-- <th>Meta Keywords</th> --}}
                    {{-- <th>Meta Description</th> --}}
                    <th>Parent ID</th>
                    {{-- <th>Sort Order</th> --}}
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if($categories->count())
                @foreach($categories as $category)
                <tr>
                    <td>#{{ $category ->id}}</td>
                    <td>{{$category -> name}}</td>
                    <td>{{ Str::limit($category -> description, 50, $end='...') }}</td>
                    {{-- <td></td> --}}
                    <td>{{$category -> meta_title}}</td>
                    {{-- <td>{{$category -> meta_keywords}}</td> --}}
                    {{-- <td>{{ Str::limit($category -> meta_description, 50, $end='...') }}</td> --}}
                    <td>{{$category -> parent_id}}</td>
                    {{-- <td>{{$category -> sort_order}}</td> --}}
                    <td>{{$category -> status}}</td>
                    <td>{{$category -> created_at ->format('d.m.Y H:i')}}</td>
                    <td>{{$category -> updated_at ->format('d.m.Y H:i')}}</td>

                    {{-- //TODO --}}
                    <td>
                        <form action="{{ route('edit.categories', $category->id) }}" method="POST">
                            @csrf
                            {{ method_field('GET') }}
                            <button type="submit" class="btn btn-success btn-sm" style="font-size: 12px"><i class="fas fa-pencil-alt"></i></button>
                        </form>
                        <form action="{{ route('delete.categories', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="font-size: 12px"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endif
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
<script src="/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
<script src="/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
<script src="/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
<script src="/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
<script src="/admin/vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
<script src="/admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
<script src="/admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>
@endsection
