@extends('preload.default')

@section('container')
    @include('partials.header')

    <div class="container">
        <div class="row">
            @if (Session::has('success'))
                <div class="alert alert-icon alert-success" role="alert" id="alert_success">
                    <i class="fe fe-check mr-2" aria-hidden="true"></i> {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::has('failure'))
                <div class="alert alert-icon alert-danger" role="alert" id="alert_success">
                    <i class="fe fe-check mr-2" aria-hidden="true"></i> {{ Session::get('failure') }}
                </div>
            @endif

            <div class="col-md">
                <h1 class="mt-5 text-center"> Health </h1>

                <table class="table table-striped" id="itemsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Item Code</th>
                            <th>Product Id</th>
                            <th>Item Name</th>
                            <th>Collection QTY</th>
                            <th>Item Price</th>
                            <th>Item Stock</th>
                            <th>Expiration Date</th>
                            <th>Pull Status</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($itemData as $items)
                            <tr>
                                <td>{{ $items->id }}</td>
                                <td>{{ $items->item_code }}</td>
                                <td>{{ $items->product_id }}</td>
                                <td>{{ $items->item_name }}</td>
                                <td>{{ $items->collection_quantity }}</td>
                                <td>{{ $items->item_price }}</td>
                                <td>{{ $items->item_stock }}</td>
                                <td>{{ $items->expiration_date }}</td>
                                @if ($items->pull_status == 0)
                                    <td>PUSHED</td>
                                @else
                                    <td>PULLED</td>                                    
                                @endif
                                <td>
                                    <form action="/dashboard/health/pull" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $items->id }}">

                                        <button class="btn btn-success"> Pull Item </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection