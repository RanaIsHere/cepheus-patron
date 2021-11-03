@extends('preload.default')

@section('container')
    @include('partials.header')

    <div class="container d-none" id="hiddenItemTableDiv">
        <div class="row">
            <div class="col-md">
                <table class="table table-striped" id="hiddenReportsItemTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Item Name</th>
                            <th>Item Stock</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($itemsData as $items)
                            <tr>
                                <td>{{ $items->id }}</td>
                                <td>{{ $items->item_name }}</td>
                                <td>{{ $items->item_stock }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row d-flex">
            <div class="col-md-4">
                <h1> Reports </h1>
            </div>

            <div class="col-md text-center" id="passageoftime">
                <div class="btn-group">
                    <a href="/dashboard/reports/profits/{{ 'present' }}" class="btn btn-outline-primary @if($passageOfTime == 'present') active @endif">Present</a>
                    <a href="/dashboard/reports/profits/{{ 'last_week' }}" class="btn btn-outline-primary @if($passageOfTime == 'last_week') active @endif">Last Week</a>
                    <a href="/dashboard/reports/profits/{{ 'last_month' }}" class="btn btn-outline-primary @if($passageOfTime == 'last_month') active @endif">Last Month</a>
                    <a href="/dashboard/reports/profits/{{ 'last_year' }}" class="btn btn-outline-primary @if($passageOfTime == 'last_year') active @endif">Last Year</a>
                </div>
            </div>

            <div class="col-md-4 text-end">
                {{-- <a href="{{ route('export') }}" role="button" class="btn btn-primary" id="printBtn"><i class="si si-printer"></i> Export</a> --}}
                <div class="dropdown">
                    <a role="button" class="btn btn-primary text-light" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="si si-printer"></i> Export </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/dashboard/reports/exportSellerData">
                          <i class="dropdown-icon fe fe-settings"></i> Export Seller Data
                        </a>

                        <a class="dropdown-item" href="/dashboard/reports/exportSellerDetailsData">
                          <i class="dropdown-icon fe fe-settings"></i> Export Seller Details Data
                        </a>

                        <a class="dropdown-item" href="/dashboard/reports/exportPurchasesData">
                          <i class="dropdown-icon fe fe-settings"></i> Export Purchases Data
                        </a>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="printBtn" onclick="javascript:window.print();"><i class="si si-printer"></i> Print</button>
            </div>
        </div>

        @if ($passageOfTime != 'present')
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"></button>
                <p class="fw-bold"> PARAMETER_CODE[{{ $passageOfTime }}] </p>
                It looks like you are looking into the past! Be warned, things might not be so accurate here. <br>
            </div>
        @endif

        <div class="row row-cards d-flex justify-content-center">
            <h3 class="text-center"> Employees </h3>

            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      {{ $supplierData->count() / 100 }}%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">{{ $supplierData->count(); }}</div>
                    <div class="text-muted mb-4">Active Supplier</div>
                  </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      {{ $userData->count() / 100 }}%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">{{ $userData->count(); }}</div>
                    <div class="text-muted mb-4">Active Employees</div>
                  </div>
                </div>
            </div>

        </div>

        <div class="row row-cards d-flex justify-content-center">
            <h3 class="text-center"> Stocks </h3>

            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      {{ $productsData->count() / 100 }}%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">{{ $productsData->count(); }}</div>
                    <div class="text-muted mb-4">Products</div>
                  </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      {{ $itemsData->count() / 100 }}%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">{{ $itemsData->count(); }}</div>
                    <div class="text-muted mb-4">Items</div>
                  </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      {{ $paymentDetailsData->sum('quantity') / 100 }}%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">{{ $paymentDetailsData->sum('quantity') }}</div>
                    <div class="text-muted mb-4">Total Resupply</div>
                  </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      {{ $supplierData->count() / 100 }}%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">{{ $supplierData->count(); }}</div>
                    <div class="text-muted mb-4">Active Suppliers</div>
                  </div>
                </div>
            </div>
        </div>

        <div class="row row-cards d-flex justify-content-center text-center">
            <h3> Sales </h3>

            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      {{ $sellerDetailsData->count() / 100 }}%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h3 m-0">{{ $sellerDetailsData->count(); }}</div>
                    <div class="text-muted mb-4">Items Sold</div>
                  </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      {{ $paymentDetailsData->count() / 100 }}%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h3 m-0">{{ $paymentDetailsData->count(); }}</div>
                    <div class="text-muted mb-4">Items Purchased</div>
                  </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      {{ $patronData->count() / 100 }}%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h3 m-0">{{ $patronData->count(); }}</div>
                    <div class="text-muted mb-4">Active Patrons</div>
                  </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      {{ $sellerData->sum('total_amount') / 100 }}%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h3 m-0">Rp. {{ $sellerData->sum('total_amount'); }}</div>
                    <div class="text-muted mb-4">Profit Gain</div>
                  </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-red">
                      -{{ $purchasesData->sum('total') / 100 }}%
                      <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h3 m-0">Rp. {{ $purchasesData->sum('total'); }}</div>
                    <div class="text-muted mb-4">Profit Loss</div>
                  </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Current Demand</h3>
                </div>
                <div class="card-header">
                    <p class="h-4 m-0 text-muted">Demands are the most important factors of Cepheus Patron. Higher demand will cause supply to drop, and low demand will cause supply to stagnant at higher values.</p>
                </div>
                <div class="card-body">
                    <div id="chart-wrapper">
                        <canvas id="demandChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection