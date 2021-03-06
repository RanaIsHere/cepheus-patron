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

                <h1> Settings </h1>

                <div class="col-md-4">
                    <form action="/dashboard/changeTheme" method="post">
                        @csrf
                        <div class="form-group mt-4">
                            <div class="form-label">Theme Mode</div>

                            <div class="custom-switches-stacked">
                                <label class="custom-switch">
                                    <input type="radio" name="option" value="LIGHT" class="custom-switch-input" checked>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Light Mode</span>
                                </label>
                                
                                <label class="custom-switch">
                                    <input type="radio" name="option" value="DARK" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Dark Mode</span>
                                </label>
                            </div>

                            <div class="form-group mt-3 text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <form action="/deleteUser" method="post">
                            @csrf

                            <div class="form-label">Request User Deletion</div>
        
                            @if (Auth::user()->isDeletion == 0)
                                <div class="form-group">
                                    <label class="form-label">Password</label>
            
                                    <div class="input-group">
                                        <span class="input-group-prepend" id="basic-addon1">
                                            <span class="input-group-text">PW</span>
                                        </span>
                                        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                    </div>
                                </div>
            
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-danger"> Request Deletion </button>
                                </div>
                            @else
                                <h3 class="text-danger"> Please wait, your request is being processed by our administrator. </h3>
                            @endif
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <h3> Presence: <span id="presenceLabel"></span></h3>
                    <h4> Present Today at {{ now()->format('M d') }}th on {{ now()->format('H:s') }}</h4>

                    <button class="btn btn-success" id="checkInBtn"> Check In </button>
                </div>

                </div>
            </div>
        </div>
    @include('partials.footer')
@endsection