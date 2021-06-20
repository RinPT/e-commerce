@extends('layouts.admin.main')

@section('styles')
    <link rel="stylesheet" href="/admin/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="/admin/vendor/pnotify/pnotify.custom.css" />
    <link rel="stylesheet" href="/admin/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
@endsection

@section('breadcrumb')
    <h2>Ticket Management</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>User Tickets</span></li>
            <li><span>Ticket Management</span></li>
            <li><span>Dashboard</span></li>
        </ol>
    </div>
@endsection

@section('content')
    @if(session('deleted'))
    <div class="row mb-3">
        <div class="col">
            <div class="alert alert-danger mb-0">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Deleted!</strong> {{ session('deleted') }}.
            </div>
        </div>
    </div>
    @endif

    <section class="card">
        <header class="card-header">
            <h2 class="card-title">User Tickets</h2>
            <p class="card-subtitle">You can see tickets from all users below.</p>
        </header>
        <div class="card-body">
            <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Title</th>
                        <th>Department</th>
                        <th>Urgency</th>
                        <th>Status</th>
                        <th>Creation Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($tickets->count())
                        @foreach ($tickets as $ticket)
                            <tr data-item-id="{{ $ticket->id }}">
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->department }}</td>
                                <td>{{ $ticket->urgency }}</td>
                                <td>{{ $ticket->status }}</td>
                                <td>{{ date('d/m/Y', strtotime($ticket->created_at)) }}</td>
                                <td class="actions d-flex">
                                    <a href="{{ route('admin.view_user_tickets.view', $ticket->id) }}" class="btn btn-dark btn-sm text-white"><i class="fas fa-eye"></i></a>
                                    <form action="{{ route('admin.ticket.delete', $ticket->id) }}" method="POST">
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

    <script src="/admin/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
    <script src="/admin/vendor/fuelux/js/spinner.js"></script>
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
