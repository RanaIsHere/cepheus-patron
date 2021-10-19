@extends('preload.default')

@section('container')
  <div class="page">
    <div class="page-single">
      <div class="container">
        <div class="row">
          <div class="col col-login mx-auto">
            <div class="text-center mb-6">
              <img src="./assets/brand/tabler.svg" class="h-6" alt="">
            </div>
            <form class="card" action="/" method="post">
              @csrf

              <div class="card-body p-6">
                <div class="card-title">Login to your account</div>
                <div class="form-group">
                  <label class="form-label">Email address</label>
                  <input type="email" name="email_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
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