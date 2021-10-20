@extends('preload.default')

@section('container')
@include('partials.header')
<div class="page">
  <div class="page-single">
    <div class="container">
      <div class="row">
        <div class="col col-login mx-auto">
          {{-- <div class="text-center mb-6">
            <img src="./assets/brand/tabler.svg" class="h-6" alt="">
          </div> --}}
          <form class="card" action="/dashboard/register" method="post">
            @csrf

            <div class="card-body p-6">
              <div class="card-title">Register an account</div>

              <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Enter username">
              </div>

              <div class="form-group">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" placeholder="Enter email">
              </div>

              <div class="form-group">
                <label class="form-label">
                  Password
                </label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                  placeholder="Password">
              </div>

              <div class="form-group">
                <label class="form-label">
                  Level of Clearance
                </label>
                {{-- <input type="password" class="form-control" name="level" id="levelClearance" placeholder="Password"> --}}
                <select name="level" class="form-control" id="levelClearance">
                    <option value="ADMIN">Admin</option>
                    <option value="EDP">EDP</option>
                    <option value="OPERATOR">OPERATOR</option>
                </select>
              </div>

              <div class="form-footer">
                <button type="submit" class="btn btn-primary btn-block">Sign up</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md">
          <table class="table table-striped" id="usersTable">
              <thead>
              <tr>
                  <th>#</th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>User Password</th>
                  <th></th>
              </tr>
              </thead>

              <tbody>
              @foreach ($userData as $users)
                  <tr>
                      <td>{{ $users->id }}</td>
                      <td>{{ $users->name }}</td>
                      <td>{{ $users->email }}</td>
                      <td>{{ $users->password }}</td>
                      <td><button class="btn btn-danger"> Delete </button></td>
                  </tr>
              @endforeach
              </tbody>
          </table>
      </div>
      </div>
    </div>
  </div>
</div>
@include('partials.footer')
@endsection