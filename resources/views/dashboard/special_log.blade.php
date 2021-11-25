@extends('preload.default')

@section('container')
    @include('partials.header')

    <div class="container">
        <div class="row">
            <div class="col-md">
                <table class="table table-striped" id="loggingTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <td>Action</td>
                            <th>Created At</th>
                            {{-- <th></th> --}}
                        </tr>
                    </thead>
    
                    <tbody class="text-center">
                        @foreach ($specialLogs as $special)
                        <tr>
                            <td>{{ $special->id }}</td>
                            <td>{{ $special->action }}</td>
                            <td>{{ $special->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection