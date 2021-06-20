<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>View Invoice - {{ $invoice->invoice_no }}</title>

    <style>
        .pay-now{
            margin-top: 10px;
            background: black;
            color: white;
            font-size: 12px;
            font-weight: bold;
            text-decoration: none;
            padding: 5px 10px;
            display: inline-block;
            border-radius: 5px;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
            margin-top: 50px;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="3">
                <table>
                    <tr>
                        <td class="title" style="vertical-align: middle;">
                            <img src="/photo/{{ $site_logo }}" style="max-width: 100%" />
                        </td>

                        <td>
                            Invoice #: {{ $invoice->invoice_no }}<br />
                            Creation Date: {{ $invoice->created_at->format('d.m.Y H:i') }}<br />
                            Paid Date : {{ is_null($invoice->date_paid) ? "-" : $invoice->date_paid->format('d.m.Y H:i') }}<br />
                            Status: @if($invoice->status == 'unpaid')
                                <span style="background: #c72828;
padding: 5px 10px;
    display: inline-block;
    color: white;
    border-radius: 5px;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: bold;">{{ $invoice->status }}</span>
                            @else
                                <span style="background: #6cc728;
padding: 5px 10px;
    display: inline-block;
    color: white;
    border-radius: 5px;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: bold;">{{ $invoice->status }}</span>
                            @endif<br />
                            @if($invoice->status == 'unpaid' && $invoice->method != 'cash')
                                <a href="" class="pay-now">Pay Now</a>
                                @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="3">
                <table>
                    <tr>
                        <td>
                            <h4 style="margin:0">Store Information</h4>
                            Name: {{ $invoice->store_name }},<br />
                            Tax NO: {{ $invoice->store_tax_no }},<br />
                            <div style="width: 150px;word-break: break-word;">
                                {{ $invoice->store_address }}<br />
                            </div>
                            {{ $invoice->store_city }}/{{ $invoice->store_country }},<br />
                            Phone: {{ $invoice->store_phone }}<br />
                        </td>
                        <td>
                            <h4 style="margin:0">Billing Information</h4>
                            {{ $invoice->name }} {{ $invoice->surname }} ({{ strtoupper($invoice->user_type) }})<br />
                            @if($invoice->company != '')Company: {{ $invoice->company }}<br />@endif
                            Telephone: {{ $invoice->telephone }}
                            <div style="width: 150px;word-break: break-word;margin-left: auto">
                                {{ $invoice->address }}
                            </div>
                            {{ $invoice->city }}/{{ $invoice->country }}<br />
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Payment Method</td>
            <td></td>
            <td style="text-align: right">{{ ucfirst($invoice->method) }}</td>
        </tr>

        <tr class="heading">
            <td>Item</td>
            <td style="text-align: center">Count</td>
            <td style="text-align: right">Price</td>
        </tr>
        @php ($pids = [])
        @foreach(json_decode($invoice->products) as $p)
        <tr class="item">
            <td>
                {{ $p->pname }}
                 @foreach($p->options as $key => $o)
                    <div>
                        » {{ ucfirst($key) }} : {{ $o }}
                    </div>
                @endforeach
            </td>
            <td style="text-align: center">{{ $p->pcount }}</td>
            <td style="text-align: right">
                {{ $invoice->currency_prefix }} {{ $p->pprice }}{{ $invoice->currency_suffix }}
                @if(!in_array($p->pid,$pids))
                    <div>
                        Cargo: {{ $invoice->currency_prefix }} {{ $p->cargoprice }}{{ $invoice->currency_suffix }}
                    </div>
                @endif
            </td>
        </tr>
            @php ($pids[] = $p->pid)
        @endforeach

        <tr class="heading">
            <td>Coupones</td>
            <td></td>
            <td style="text-align: right">#</td>
        </tr>

        @foreach(json_decode($invoice->coupons) as $c)
            @if(count($c) == 0)
                @break
            @endif
            <tr class="item">
                <td>
                    {{ $c[0]->code }}
                </td>
                <td>
                </td>
                <td style="text-align: right">
                    @if($c[0]->rate != 0)
                        - {{ $c[0]->rate }} %
                    @else
                        - {{ $invoice->currency_prefix }} {{ $c[0]->price }}{{ $invoice->currency_suffix }}
                    @endif
                </td>
            </tr>
        @endforeach

        <tr class="total">
            <td></td>
            <td></td>
            <td style="text-align: right">Total: {{ $invoice->currency_prefix }} {{ $invoice->total }}{{ $invoice->currency_suffix }}</td>
        </tr>
    </table>
</div>
</body>
</html>
