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
                    <div class="alert alert-icon alert-success" role="alert" id="alert_success">
                        <i class="fe fe-check mr-2" aria-hidden="true"></i> {{ Session::get('failure') }}
                    </div>
                @endif

                <div class="col-md-4">
                    <form action="/dashboard/supply/buy" method="post">
                        @csrf
    
                        {{-- <input type="hidden" name="user_id" id="inputId" value="{{ Auth::user()->id; }}"> --}}
                        {{-- <input type="hidden" name="chosen_items" value="{{  }}"}> --}}
                        {{-- Hidden input that can send an array through POST, saved by JS --}}
                        {{-- <div class="form-group" id="groupOfHiddens"></div> --}}
    
                        <input type="hidden" name="item_id" id="itemId" value="">

                        <div class="form-group">
                            <label class="form-label">Select Supplier</label>
    
                            <div class="input-group">
                                <span class="input-group-prepend" id="basic-addon1">
                                    <span class="input-group-text">SUS</span>
                                </span>
                                <input type="text" class="form-control" name="supplier_id" placeholder="Supplier ID" id="supplierId" aria-label="Supplier ID" aria-describedby="basic-addon1" readonly>
                            </div>
    
                            <p class="form-text"> Current Supplier: <span id="supplierName" class="fw-bold"></span> </p> 
                        </div>

                        <div class="form-group">
                            <label class="form-label">Stock Quantity</label>
    
                            <div class="input-group">
                                <span class="input-group-prepend" id="basic-addon1">
                                    <span class="input-group-text">QTY</span>
                                </span>
                                <input type="number" class="form-control form-control-lg" name="stock_quantity" id="stockQuantity" placeholder="Stock quantity" aria-label="Stock quantity" aria-describedby="basic-addon1" min="5">
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label class="form-label">Total Price</label>
    
                            <div class="input-group">
                                <span class="input-group-prepend" id="basic-addon1">
                                    <span class="input-group-text">Rp.</span>
                                </span>
                                <input type="text" class="form-control form-control-lg" name="total_amount" id="totalPrice" placeholder="Total from purchase" aria-label="Total from purchase" aria-describedby="basic-addon1" readonly>
                            </div>

                            <p class="form-text"> Resupplying: <span id="supplyName" class="fw-bold"></span> </p> 
                        </div>
    
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" id="supplyAddBtn"> Add Supply</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-8">
                    <table class="table table-striped" id="suppliersTable">
                        <thead>
                        <tr>
                            <th class="d-none">#</th>
                            <th>Supplier Code</th>
                            <th>Supplier Name</th>
                            <th></th>
                        </tr>
                        </thead>
    
                        <tbody>
                        @foreach ($supplierData as $supLier)
                            <tr>
                                <td class="d-none">{{ $supLier->id }}</td>
                                <td>{{ $supLier->supplier_code }}</td>
                                <td>{{ $supLier->supplier_name }}</td>
                                <td><button class="btn btn-primary chooseSupplierBtn">Choose</button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <table class="table table-striped" id="itemsTable">
                        <thead>
                            <tr>
                                <th class="d-none">#</th>
                                <th>Item Code</th>
                                {{-- <th>Product Id</th> --}}
                                <th>Item Name</th>
                                <th>Item Price</th>
                                <th>Item Stock</th>
                                <th></th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($itemData as $items)
                                <tr>
                                    <td class="d-none">{{ $items->id }}</td>
                                    <td>{{ $items->item_code }}</td>
                                    {{-- <td>{{ $items->product_id }}</td> --}}
                                    <td>{{ $items->item_name }}</td>
                                    <td>{{ $items->item_price }}</td>
                                    <td>{{ $items->item_stock }}</td>
                                    <td><button class="btn btn-success resupplyStockBtn"> Resupply </button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @include('partials.footer')
@endsection