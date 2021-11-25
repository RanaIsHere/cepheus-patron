@if ($page == 'Products')
<style>
    .dataTables_filter{ 
        display: flex;
        justify-content: flex-end; 
    }
</style>

<div class="modal fade" id="productsModal" tabindex="-1" aria-labelledby="productsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productsModalLabel">Create Products/Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        

                        <div class="col-md">
                            <form action="/dashboard/products" method="post">
                                @csrf

                                <div class="form-group">
                                    <label class="form-label">Product Name</label>

                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">PD</span>
                                        </span>
                                        <input type="text" class="form-control" name="product_name"
                                            placeholder="Product name" aria-label="Product name"
                                            aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary"> Add Product</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md">
                            <table class="table table-striped w-100" id="productsTable">
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

                        <div class="col-md">
                            <form action="/dashboard/items" method="post">
                                @csrf

                                <div class="form-group">
                                    <label class="form-label">Products</label>

                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">PID</span>
                                        </span>
                                        <input type="text" class="form-control" name="product_id" id="productId"
                                            placeholder="Product ID" aria-label="Product ID"
                                            aria-describedby="basic-addon1" readonly required>
                                    </div>

                                    <p class="form-text"> Current Product: <span id="pid_name" class="fw-bold"></span>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Item Name</label>

                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">#</span>
                                        </span>
                                        <input type="text" class="form-control" name="item_name" placeholder="Item name"
                                            aria-label="Item name" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Item Quantity</label>

                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">QTY</span>
                                        </span>
                                        <input type="number" class="form-control" name="collection_quantity"
                                            placeholder="Item Quantity" aria-label="Item Quantity"
                                            aria-describedby="basic-addon1" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Item Price</label>

                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">Rp.</span>
                                        </span>
                                        <input type="number" class="form-control" name="item_price"
                                            placeholder="Item price" aria-label="Item price"
                                            aria-describedby="basic-addon1" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Expiration Date</label>

                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">Y-m-D</span>
                                        </span>
                                        <input type="date" class="form-control" name="expiration_date"
                                            placeholder="Expiration date" aria-label="Expiration date"
                                            aria-describedby="basic-addon1" required>
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label class="form-label">Item Stock</label>

                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">STOCK</span>
                                        </span>
                                        <input type="number" class="form-control" name="item_stock"
                                            placeholder="Item stock" aria-label="Item stock"
                                            aria-describedby="basic-addon1" required>
                                    </div>
                                </div> --}}

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary"> Add Item</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            </div>
        </div>
    </div>
</div>
@endif

@if ($page == 'Patrons')
<style>
    .dataTables_filter{ 
        display: flex;
        justify-content: flex-end; 
    }
</style>

<div class="modal fade" id="patronsModal" tabindex="-1" aria-labelledby="patronsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="patronsModalLabel">Create Products/Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md">
                            <form action="/dashboard/patrons" method="post">
                                @csrf
            
                                <div class="form-group">
                                    <label class="form-label">Full name</label>
            
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">#</span>
                                        </span>
                                        <input type="text" class="form-control" name="patron_name" placeholder="Full name" aria-label="Full name" aria-describedby="basic-addon1">
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label class="form-label">Home Address</label>
            
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">A</span>
                                        </span>
                                        <input type="text" class="form-control" name="patron_address" placeholder="Patron address" aria-label="Patron address" aria-describedby="basic-addon1">
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
            
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">+</span>
                                        </span>
                                        <input type="text" class="form-control" name="patron_phone" placeholder="Patron phone's number" aria-label="Patron phone's number" aria-describedby="basic-addon1">
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label class="form-label">Email</label>
            
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">@</span>
                                        </span>
                                        <input type="email" class="form-control" name="email" placeholder="Patron email" aria-label="Patron email" aria-describedby="basic-addon1">
                                    </div>
                                </div>
            
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary"> Add Patron</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            </div>
        </div>
    </div>
</div>
@endif

@if ($page == 'Suppliers')
<style>
    .dataTables_filter{ 
        display: flex;
        justify-content: flex-end; 
    }
</style>

<div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supplierModalLabel">Create Products/Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md">
                            <form action="/dashboard/suppliers" method="post">
                                @csrf
            
                                <div class="form-group">
                                    <label class="form-label">Supplier name</label>
            
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">#</span>
                                        </span>
                                        <input type="text" class="form-control" name="supplier_name" placeholder="Supplier name" aria-label="Supplier name" aria-describedby="basic-addon1">
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label class="form-label">Supplier Address</label>
            
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">A</span>
                                        </span>
                                        <input type="text" class="form-control" name="supplier_address" placeholder="Supplier address" aria-label="Supplier address" aria-describedby="basic-addon1">
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label class="form-label">Supplier City</label>
            
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">C</span>
                                        </span>
                                        <input type="text" class="form-control" name="supplier_city" placeholder="Supplier city" aria-label="Supplier city" aria-describedby="basic-addon1">
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label class="form-label">Supplier Phone</label>
            
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">+</span>
                                        </span>
                                        <input type="text" class="form-control" name="supplier_phone" placeholder="Supplier phone's number" aria-label="Supplier phone's number" aria-describedby="basic-addon1">
                                    </div>
                                </div>
            
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary"> Add Supplier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            </div>
        </div>
    </div>
</div>
@endif

@if ($page == 'Transactions')
<style>
    .dataTables_filter{ 
        display: flex;
        justify-content: flex-end; 
    }
</style>

<div class="modal fade" id="patronSelectModal" tabindex="-1" aria-labelledby="patronSelectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="patronSelectModalLabel">Patrons</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md">
                            <table class="table table-striped w-100 text-center" id="patronsTable">
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
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            </div>
        </div>
    </div>
</div>
@endif

@if ($page == 'Special')
<style>
    .dataTables_filter{ 
        display: flex;
        justify-content: flex-end; 
    }
</style>

<div class="modal fade" id="specialModal" tabindex="-1" aria-labelledby="specialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable w-100">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="specialModalLabel">Create Special Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md">
                            <table class="table table-striped w-100 text-center" id="patronsTable">
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
                                        <td> <button class="btn btn-primary choosePatronSupplyBtn"> Choose </button> </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md">
                            <form action="/dashboard/requestSpecial" method="post">
                                @csrf
            
                                <div class="form-group">
                                    <label class="form-label">Patron ID</label>
            
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">#</span>
                                        </span>
                                        <input type="text" class="form-control" name="patron_id" placeholder="Patron ID" id="patronIDInput" aria-label="Supplier name" aria-describedby="basic-addon1" readonly>
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label class="form-label">Item ID</label>
            
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">PID</span>
                                        </span>
                                        <input type="text" class="form-control" name="item_id" placeholder="Item ID" id="itemIDInput" aria-label="Supplier address" aria-describedby="basic-addon1" readonly>
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label class="form-label">Quantity</label>
            
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">QTY</span>
                                        </span>
                                        <input type="number" class="form-control" name="quantity" placeholder="Quantity" aria-label="Supplier city" aria-describedby="basic-addon1" min="1" value="1">
                                    </div>
                                </div>
            
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary"> Add Supplier</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md">
                            <table class="table table-striped w-100" id="itemsTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item Code</th>
                                        <th>Product Id</th>
                                        <th>Item Name</th>
                                        <th>Item Price</th>
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
                                        <td>{{ $items->item_price }}</td>
                                        <td><button class="btn btn-primary chooseItemSupplyBtn"> Choose </button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            </div>
        </div>
    </div>
</div>
@endif