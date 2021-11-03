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
                <div class="text-end">
                    <button type="button" class="btn btn-primary btn-sm mb-5" data-bs-toggle="modal" data-bs-target="#patronsModal">Create Patrons</button>
                </div>

                <table class="table table-striped" id="patronsTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Patron Code</th>
                        <th>Patron Name</th>
                        <th>Patron Address</th>
                        <th>Patron Phone</th>
                        <th>Patron Email</th>
                    </tr>
                    </thead>

                    <tbody>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection