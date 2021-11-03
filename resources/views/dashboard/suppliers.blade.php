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
            
            <div class="text-end">
                <button type="button" class="btn btn-primary btn-sm mb-5" data-bs-toggle="modal" data-bs-target="#supplierModal">Create Supplier</button>
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