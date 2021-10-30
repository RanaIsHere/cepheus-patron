<div class="page">
    <div class="page-main">
      <div class="header py-4">
        <div class="container">
          <div class="d-flex">
            <a class="header-brand" href="/dashboard">
              {{-- <img src="./demo/brand/tabler.svg" class="header-brand-img" alt="tabler logo"> --}}
              <h3> Cepheus Patrons</h3>
            </a>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="dropdown">
                <a class="nav-link pr-0 leading-none" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="avatar" style="background-image: url(./demo/faces/female/25.jpg)"></span>
                  <span class="ml-2 d-none d-lg-block">
                    <span class="text-default"> {{ Auth::user()->name; }} </span>
                    <small class="text-muted d-block mt-1">{{ Auth::user()->level; }}</small>
                  </span>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/dashboard/settings">
                    <i class="dropdown-icon fe fe-settings"></i> Settings
                  </a>
                  @if (Auth::user()->level == 'ADMIN' OR Auth::user()->level == 'OWNER')
                  <a class="dropdown-item" href="/dashboard/register">
                    <i class="dropdown-icon fe fe-settings"></i> Register User
                  </a>
                  @endif
                  <a class="dropdown-item" href="/logout">
                    <i class="dropdown-icon fe fe-log-out"></i> Sign out
                  </a>
                </div>
              </div>
            </div>
            <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
              <span class="header-toggler-icon"></span>
            </a>
          </div>
        </div>
      </div>
      <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
        <div class="container">
          <div class="row align-items-center">
            {{-- <div class="col-lg-3 ml-auto">
              <form class="input-icon my-3 my-lg-0">
                <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                <div class="input-icon-addon">
                  <i class="fe fe-search"></i>
                </div>
              </form>
            </div> --}}
            <div class="col-lg order-lg-first">
              <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                <li class="nav-item">
                  <a href="/dashboard" class="nav-link"><i class="fe fe-home"></i> Home</a>
                </li>
                @if (Auth::user()->level == 'EDP')
                <li class="nav-item">
                  <a href="/dashboard/patrons" class="nav-link"><i class="fe fe-box"></i> Patrons </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/products" class="nav-link"><i class="fe fe-box"></i> Products </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/suppliers" class="nav-link"><i class="fe fe-box"></i> Suppliers </a>
                </li>
                @endif
                
                @if (Auth::user()->level == 'OPERATOR')
                <li class="nav-item">
                  <a href="/dashboard/transactions" class="nav-link"><i class="fe fe-home"></i> Transactions </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/supply" class="nav-link"><i class="fe fe-home"></i> Supply </a>
                </li>
                @endif

                @if (Auth::user()->level == 'OPERATOR' OR Auth::user()->level == 'ADMIN')
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="dropdown"><i class="fe fe-home"></i> Reports</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                        <a href="/dashboard/reports/invoices" class="dropdown-item">Invoices</a>
                        <a href="/dashboard/reports/stocks" class="dropdown-item">Stock Details</a>

                        @if (Auth::user()->level == 'ADMIN')
                          <a href="/dashboard/reports/profits" class="dropdown-item">Profit Details</a>
                        @endif
                    </div>
                  </li>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    <div class="my-3 my-md-5">
      <div class="container">
        @if (Session::has('illegal'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('illegal') }}
            </div>
        @endif   
      </div>
    </div>
</div>