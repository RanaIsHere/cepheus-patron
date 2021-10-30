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
                <form action="/dashboard/products" method="post">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Product Name</label>

                        <div class="input-group">
                            <span class="input-group-prepend" id="basic-addon1">
                                <span class="input-group-text">PD</span>
                            </span>
                            <input type="text" class="form-control" name="product_name" placeholder="Product name" aria-label="Product name" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary"> Add Product</button>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <table class="table table-striped" id="productsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($productData as $pd)
                            <tr>
                                <td>{{ $pd->id }}</td>
                                <td>{{ $pd->product_name }}</td>
                                <td><button class="btn btn-primary chooseProductBtn"> Choose </button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <form action="/dashboard/items" method="post">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Products</label>

                        <div class="input-group">
                            <span class="input-group-prepend" id="basic-addon1">
                                <span class="input-group-text">PID</span>
                            </span>
                            <input type="text" class="form-control" name="product_id" id="productId" placeholder="Product ID" aria-label="Product ID" aria-describedby="basic-addon1" readonly required>
                        </div>

                        <p class="form-text"> Current Product: <span id="pid_name" class="fw-bold"></span> </p>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Item Name</label>

                        <div class="input-group">
                            <span class="input-group-prepend" id="basic-addon1">
                                <span class="input-group-text">#</span>
                            </span>
                            <input type="text" class="form-control" name="item_name" placeholder="Item name" aria-label="Item name" aria-describedby="basic-addon1" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Item Quantity</label>

                        <div class="input-group">
                            <span class="input-group-prepend" id="basic-addon1">
                                <span class="input-group-text">QTY</span>
                            </span>
                            <input type="number" class="form-control" name="collection_quantity" placeholder="Item Quantity" aria-label="Item Quantity" aria-describedby="basic-addon1" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Item Price</label>

                        <div class="input-group">
                            <span class="input-group-prepend" id="basic-addon1">
                                <span class="input-group-text">Rp.</span>
                            </span>
                            <input type="number" class="form-control" name="item_price" placeholder="Item price" aria-label="Item price" aria-describedby="basic-addon1" required>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label class="form-label">Item Stock</label>

                        <div class="input-group">
                            <span class="input-group-prepend" id="basic-addon1">
                                <span class="input-group-text">STOCK</span>
                            </span>
                            <input type="number" class="form-control" name="item_stock" placeholder="Item stock" aria-label="Item stock" aria-describedby="basic-addon1" required>
                        </div>
                    </div> --}}

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary"> Add Item</button>
                    </div>
                </form>
            </div>


            {{-- <div class="col-md">
                <table class="table table-striped" id="patronsTable">
                    <tr>
                        <th>#</th>
                        <th>Patron Code</th>
                        <th>Patron Name</th>
                        <th>Patron Address</th>
                        <th>Patron Phone</th>
                        <th>Patron Email</th>
                    </tr>

                    @foreach ($patronData as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->patron_code }}</td>
                            <td>{{ $p->patron_name }}</td>
                            <td>{{ $p->patron_address }}</td>
                            <td>{{ $p->patron_phone }}</td>
                            <td>{{ $p->email }}</td>
                        </tr>
                    @endforeach
                </table>
            </div> --}}
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-md">
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