@extends('preload.default')

@section('container')
@include('partials.header')
<div class="container">
    <div class="row mt-5 mb-5">
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
            <div class="text-end">
                <button type="button" class="btn btn-primary btn-sm mb-5" data-bs-toggle="modal"
                    data-bs-target="#productsModal">Create Products/Items</button>
            </div>

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
                        {{-- <th></th> --}}
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
                        {{-- <td><button class="btn btn-primary chooseProductBtn"> Choose </button></td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('partials.footer')
@endsection