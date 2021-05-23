@extends('layouts.admin.main')

@section('styles')
<link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
<link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
<link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
@endsection

@section('content')
<section class="card">
    <header class="card-header">
        <h2 class="card-title">All Categories</h2>
        <p class="card-subtitle">You can see all categories below.</p>
    </header>
    <div class="card-body">
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
        <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Top Category</th>
                    <th>Status</th>
                    <th>Last Update</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
            @if($categories->count())
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id}}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ Str::limit($category -> description, 50, $end='...') }}</td>
                    <td>
                        @if($category->parent['id'] == 0)
                            <span class="badge badge-primary">{{ $category->parent['name'] }}</span>
                        @else
                            <a href="{{ route('admin.category.edit', $category->parent['id']) }}" class="badge badge-dark">{{$category->parent['name']}}</a>
                        @endif
                    </td>
                    <td>
                        @if($category->status)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{$category->updated_at->format('d.m.Y H:i')}}</td>
                    <td class="actions d-flex">
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="modal-with-zoom-anim ws-normal btn btn-success btn-sm text-white">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
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
@endsection
