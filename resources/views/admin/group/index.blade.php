@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
@endsection

@section('content')
    <section class="card">
        <header class="card-header">

            <h2 class="card-title">Groups</h2>
            <p class="card-subtitle">You can see all available groups below.</p>
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
                    <th>Group ID</th>
                    <th>Name</th>
                    <th>Creation Date</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td>{{ $group->id }}</td>
                            <td class="text-capitalize">{{ $group->name }}</td>
                            <td>{{ is_null($group->created_at) ? "-" : $group->created_at->format('d.m.Y H:i') }}</td>
                            <td>
                                @if(!in_array($group->id,[1,2,3]))
                                <a href="{{ route('admin.group.edit',$group->id) }}" class="btn btn-success btn-sm"><i class='fas fa-pencil-alt'></i></a>
                                <a href="{{ route('admin.group.destroy',$group->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
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
