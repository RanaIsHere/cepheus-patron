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

            <div class="col-md-4">
                <form action="/dashboard/transactions/sell" method="post">
                    @csrf

                    {{-- <input type="hidden" name="user_id" id="inputId" value="{{ Auth::user()->id; }}"> --}}
                    {{-- <input type="hidden" name="chosen_items" value="{{  }}"}> --}}
                    {{-- Hidden input that can send an array through POST, saved by JS --}}
                    <div class="form-group" id="groupOfHiddens"></div>

                    <div class="form-group">
                        <label class="form-label">Select Patrons</label>

                        <div class="input-group">
                            <span class="input-group-prepend" id="basic-addon1">
                                {{-- <span class="input-group-text">PTR</span> --}}
                                <button type="button" class="btn btn-primary btn-sm mb-5" data-bs-toggle="modal" data-bs-target="#patronSelectModal">Select</button>
                            </span>
                            <input type="text" class="form-control" name="patronName" aria-describedby="basic-addon1" id="patronName" disabled>
                            <input type="hidden" class="form-control" name="patron_id" placeholder="Patron ID" id="patronId" aria-label="Patron ID" aria-describedby="basic-addon1" readonly>
                        </div>

                        {{-- <p class="form-text"> Current Patron: <span id="patronName" class="fw-bold"></span> </p>  --}}
                    </div>

                    <div class="form-group">
                        <label class="form-label">Total Price</label>

                        <div class="input-group">
                            <span class="input-group-prepend" id="basic-addon1">
                                <span class="input-group-text">Rp.</span>
                            </span>
                            <input type="text" class="form-control form-control-lg" name="total_amount" id="totalPrice" placeholder="Total from purchase" aria-label="Total from purchase" value="0" aria-describedby="basic-addon1" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label"> Amount of Items </div>
                        
                        <div class="input-group">
                            <span class="input-group-prepend" id="basic-addon1">
                                <span class="input-group-text">ITEMS</span>
                            </span>
                            <input type="text" class="form-control form-control-lg" name="quantity_of_items" id="totalItems" placeholder="Total quantity from items" aria-label="Total quantity from items" aria-describedby="basic-addon1" value="0" readonly>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" id="addTransactionBtn"> Add Transactions</button>
                    </div>
                </form>
            </div>

            <div class="col-md-8">
                <h3> Items: </h3>

                <table class="table table-striped" id="pickedItemsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Quantity</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- <tr class="itemRow">
                            <td id="itemName"></td>
                            <td id="itemPrice"></td>
                        </tr> --}}
                    </tbody>
                </table>

                {{-- <div class="text-center">
                    <button type="button" class="btn btn-primary" id="saveBtn">Save</button>
                </div> --}}
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <h1 class="mt-5 text-center"> Store </h1>

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
                                <td><button class="btn btn-success addItemBtn"> Add to Cart </button></td>
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