@extends('preload.default')

@section('container')
    @include('partials.header')

    <div class="container">
        <div class="row">
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
                                <span class="input-group-text">PTR</span>
                            </span>
                            <input type="text" class="form-control" name="patron_id" placeholder="Patron ID" id="patronId" aria-label="Patron ID" aria-describedby="basic-addon1" readonly>
                        </div>

                        <p class="form-text"> Current Patron: <span id="patronName" class="fw-bold"></span> </p> 
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

            <div class="col-md-4">
                <h3> Patrons: </h3>

                <table class="table table-striped" id="patronsTable">
                    <thead>
                    <tr>
                        <th class="d-none">#</th>
                        <th>Patron Code</th>
                        <th>Patron Name</th>
                        <th class="d-none">Patron Address</th>
                        <th class="d-none">Patron Phone</th>
                        <th class="d-none">Patron Email</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($patronData as $p)
                        <tr>
                            <td class="d-none">{{ $p->id }}</td>
                            <td>{{ $p->patron_code }}</td>
                            <td>{{ $p->patron_name }}</td>
                            <td class="d-none">{{ $p->patron_address }}</td>
                            <td class="d-none">{{ $p->patron_phone }}</td>
                            <td class="d-none">{{ $p->email }}</td>
                            <td> <button class="btn btn-primary choosePatronBtn"> Choose </button> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
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