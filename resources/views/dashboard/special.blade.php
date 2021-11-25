@extends('preload.default')

@section('container')
    @include('partials.header')

    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="text-end">
                    <button type="button" class="btn btn-primary btn-sm mb-5" onclick="javascript:window.print();"><i class="si si-printer"></i> Export/Print </button>

                    <a href="{{ route('exportSpecial') }}" class="btn btn-primary btn-sm mb-5"><i class="si si-printer"></i> Export as XLSX </a>
                </div>

                <div class="text-end">
                    <button type="button" class="btn btn-primary btn-sm mb-5" data-bs-toggle="modal"
                        data-bs-target="#specialModal">Create Special Request</button>
                </div>

                <table class="table table-striped" id="specialTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <td>Item ID</td>
                            <th>Patron Name</th>
                            <th>Item Name</th>
                            <th>Sent At</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th></th>
                            {{-- <th></th> --}}
                        </tr>
                    </thead>
    
                    <tbody class="text-center">
                        @foreach ($specialData as $special)
                        <tr>
                            <td>{{ $special->id }}</td>
                            <td>{{ $special->item_id }}</td>
                            <td>{{ $special->patron->patron_name }}</td>
                            <td>{{ $special->item->item_name }}</td>
                            <td>{{ $special->created_at }}</td>
                            <td>{{ $special->item_quantity }}</td>
                            <td class="form-check form-switch"><input type="checkbox" name="d" role="switch" class="form-check-input statusSwitch" value="{{ $special->status }}" {{ $special->status == 1 ? "checked='1'" : "" }}></td>
                            <td><button class="btn btn-primary SpecialEditBtn" data-bs-toggle="modal"
                                data-bs-target="#editSpecialModal"> Edit </button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection