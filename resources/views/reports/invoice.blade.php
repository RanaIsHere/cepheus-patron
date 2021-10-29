@extends('preload.default')

@section('container')
    @include('partials.header')

    <div class="container">
        <div class="row">
            <div class="col-md">
                <h3> Invoices </h3>

                <div class="card p-2">
                    <table class="table card-table" id="invoiceListTable">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Invoice ID</th>
                                <th class="text-center">Invoice Date</th>
                                <th class="text-center">Total</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($sellerData as $seller)
                                <tr>
                                    <td class="text-center">{{ $seller->id }}</td>
                                    <td class="text-center">{{ $seller->invoice_id }}</td>
                                    <td class="text-center">{{ $seller->invoice_date }}</td>
                                    <td class="text-center">{{ $seller->total_amount }}</td>
                                    <td class="text-center"><a href="/dashboard/reports/invoices/{{ $seller->invoice_id }}" role="button" class="btn btn-primary">View Invoice</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection