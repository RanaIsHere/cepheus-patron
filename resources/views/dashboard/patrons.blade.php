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

            <div class="col-md">
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