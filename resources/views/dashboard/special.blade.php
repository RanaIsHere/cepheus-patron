@extends('preload.default')

@section('container')
    @include('partials.header')

    <div class="container">
        <div class="row">
            <div class="col-md">
                <table class="table table-striped" id="specialTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Patron Name</th>
                            <th>Item Name</th>
                            <th>Sent At</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th></th>
                            {{-- <th></th> --}}
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ($specialData as $special)
                        <tr>
                            <td>{{ $special->id }}</td>
                            <td>{{ $special->patron->patron_name }}</td>
                            <td>{{ $special->item->item_name }}</td>
                            <td>{{ $special->created_at }}</td>
                            <td>{{ $special->item_quantity }}</td>
                            <td><input type="checkbox" name="status_switch" id="statusSwitch" value="{{ $special->status }}"></td>
                            <td><button class="btn btn-primary chooseProductBtn"> Choose </button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection