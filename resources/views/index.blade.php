@extends('preload.default')

@section('container')
  <div class="page">
    <div class="page-single">
      <div class="container">
        <div class="row">
          <div class="col col-login mx-auto">
            <div class="text-center mb-6">
              <img src="./assets/brand/tabler.svg" class="h-6" alt="">
              <h1>Cepheus Patron</h1>
            </div>

            @mobile
              <div class="alert alert-danger" role="alert">
                  It seems that you are using this tool on a mobile device. Please be warned that we did not test this application with the exception of desktop devices.    
              </div>
            @endmobile

            <form class="card" action="/" method="post">
              @csrf

              <div class="card-body p-6">
                <div class="card-title">Login to your account</div>
                <div class="form-group">
                  <label class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label class="form-label">
                    Password
                  </label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-footer">
                  <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection