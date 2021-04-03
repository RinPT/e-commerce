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

        <h2 class="card-title">Author's Tickets</h2>
        <p class="card-subtitle">You can see all available author's tickets below.</p>
    </header>
    <div class="card-body">
        <table class="table table-bordered table-striped mb-0" id="datatable-custom">
            <thead>
                <tr>
                    <th>Ticket ID</th>
                    <th>Author ID</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Urgency</th>
                    <th>Read?</th>
                    <th>Status</th>
                    <th>Creation Date</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
            @if($tickets->count())
                @foreach($tickets as $ticket)
                <tr>
                    <td>#{{ $ticket ->ticket_id}}</td>
                    <td>eklencek</td>
                    <td>{{$ticket -> title}}</td>
                    <td>{{ Str::limit($ticket -> message, 50, $end='...') }}</td>
                    <td>{{$ticket -> urgency}}</td>
                    <td>
                        @if($ticket->author_unread)
                            <span class="badge badge-danger">No</span>
                        @else
                            <span class="badge badge-success">Yes</span>
                        @endif

                    </td>
                    <td>{{$ticket -> status}}</td>
                    <td>{{$ticket -> created_at ->format('d.m.Y H:i')}}</td>
                    <td>
                        <a class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
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
