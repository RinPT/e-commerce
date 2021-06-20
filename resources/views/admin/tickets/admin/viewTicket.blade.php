@extends('layouts.admin.main')

@section('styles')
    <style>
        .author-box{
            border: 2px solid #7aadfb;
            width: 60%;
            background: #2466cc;
            box-shadow: 0px 2px 10px 2px #d6d0d0;
            padding: 15px;
            color: white;
            margin-bottom: 20px;
            border-radius: 10px;
            margin-left: auto;
        }
        .user-box{
            border: 2px solid #a2a2a2;
            width: 60%;
            background: #222222;
            box-shadow: 0px 2px 10px 2px #d6d0d0;
            padding: 15px;
            color: white;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .at-group{
            background: white;
            font-size: 12px;
            color: black;
            border-radius: 10px;
            padding: 5px;
            box-shadow: 2px 2px 2px 1px #235aaf;
            font-weight: bold;
            margin-left: 10px;
        }
        .at-user-group {
            background: white;
            font-size: 12px;
            color: black;
            border-radius: 10px;
            padding: 5px;
            box-shadow: 2px 2px 2px 1px #676767;
            font-weight: bold;
            margin-left: 10px;
        }
        .at-desc {
            font-size: 12px;
            line-height: 2;
            margin-top: 10px;
            margin-bottom: 0;
        }
        .messages {
            background: #f7f7f7;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 10px 10px 2px #e2e2e2;
            overflow-y: scroll;
            max-height: 450px;
        }
        .bb {
            background: #f7f7f7;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 10px 10px 2px #e2e2e2;
        }
        .hh {
            font-size: 3rem;
            font-weight: 700;
            line-height: 1;
            letter-spacing: -.0125em;
            color: #222;
        }
    </style>
@endsection

@section('breadcrumb')
    <h2>Ticket Management</h2>

    <div class="right-wrapper text-right mr-2">
        <ol class="breadcrumbs">
            <li><span>Admin Tickets</span></li>
            <li><span>Ticket Management</span></li>
            <li><span>Dashboard</span></li>
        </ol>
    </div>
@endsection

@section('content')

    <main class="main account">
        <div class="container">
            <div class="row mt-5 mb-5 text-center">
                <div class="col-md-4">
                    <div class="bb">
                        <div class="hh">Title</div>
                        <div>{{ $ticket->title }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bb">
                        <div class="hh">Status</div>
                        <div style="text-transform: capitalize">{{ $ticket->status }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bb">
                        <div class="hh">Urgency</div>
                        <div style="text-transform: capitalize">{{ $ticket->urgency }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content mt-4 mb-10 pb-6">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="messages" id="mbox">
                            @if($ticket->sender_type === 'admin')
                                <div class="author-box">
                                    <div class="author-name">
                                        {{ $logged_author->name }}
                                        <span class="at-user-group" style="float:right">{{ $ticket->created_at->format('d.m.Y H:i') }}</span>
                                    </div>
                                    <p class="at-desc text-white">{{ $ticket->message }}</p>
                                </div>
                            @elseif ($ticket->sender_type === 'user')
                                <div class="user-box">
                                    <div class="author-name">
                                        {{ $user->name }} {{ $user->surname }}
                                        <span class="at-user-group" style="float:right">{{ $ticket->created_at->format('d.m.Y H:i') }}</span>
                                    </div>
                                    <p class="at-desc text-white">{{ $ticket->message }}</p>
                                </div>
                            @endif
                            @foreach($replies as $r)
                                @if($r->sender_type == 'user')
                                    <div class="user-box">
                                        <div class="author-name">
                                            {{ $r->user->name }} {{ $r->user->surname }}
                                            <span class="at-user-group" style="float:right">{{ $r->created_at->format('d.m.Y H:i') }}</span>
                                        </div>
                                        <p class="at-desc text-white">{{ $r->message }}</p>
                                    </div>
                                @else
                                    <div class="author-box">
                                        <div class="author-name">
                                            {{ $logged_author->name }}
                                            <span class="at-group" style="float:right">{{ $r->created_at->format('d.m.Y H:i') }}</span>
                                        </div>
                                        <p class="at-desc text-white">{{ $r->message }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <form action="{{ route('admin.ticket.answer', ['tid' => $ticket->id]) }}" method="post">
                            @csrf
                            <label>Message</label>
                            <textarea class="form-control mb-2" name="message" rows="7" required style="border: 3px solid #efefef;"></textarea>
                            <button class="btn btn-dark">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('scripts')
    <script>
        var objDiv = document.getElementById("mbox");
        objDiv.scrollTop = objDiv.scrollHeight;
    </script>
@endsection
