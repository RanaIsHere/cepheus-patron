@extends('preload.default')

@section('container')
    @include('partials.header')

    <div class="container">
        <div class="row">
            <div class="col-md">
                <h3> Stocks List </h3>

                <div class="card p-2">
                    <table class="table card-table" id="stocksListTable">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Collection Code</th>
                                <th class="text-center">Collection Date</th>
                                <th class="text-center">Total</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($purchasesData as $purch)
                                <tr>
                                    <td class="text-center">{{ $purch->id }}</td>
                                    <td class="text-center">{{ $purch->collection_code }}</td>
                                    <td class="text-center">{{ $purch->collection_date }}</td>
                                    <td class="text-center">{{ $purch->total }}</td>
                                    <td class="text-center"><a href="/dashboard/reports/stocks/{{ $purch->collection_code }}" role="button" class="btn btn-primary">View Details</a></td>
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