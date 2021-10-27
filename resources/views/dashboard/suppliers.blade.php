@extends('preload.default')

@section('container')
    @include('partials.header')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
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

            <div class="col-md">
                <table class="table table-striped" id="suppliersTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Supplier Code</th>
                        <th>Supplier Name</th>
                        <th>Supplier Address</th>
                        <th>Supplier City</th>
                        <th>Supplier Phone</th>
                        {{-- <th></th> --}}
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($supplierData as $supLier)
                        <tr>
                            <td>{{ $supLier->id }}</td>
                            <td>{{ $supLier->supplier_code }}</td>
                            <td>{{ $supLier->supplier_name }}</td>
                            <td>{{ $supLier->supplier_address }}</td>
                            <td>{{ $supLier->supplier_city }}</td>
                            <td>{{ $supLier->supplier_phone }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection