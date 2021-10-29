@extends('preload.default')

@section('container')
    @include('partials.header')

    <div class="container">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">#<a href="/dashboard/invoices/{{ $seller->invoice_id }}">{{ $seller->invoice_id }}</a></h3>
            
            <div class="card-options">
              <button type="button" class="btn btn-primary" onclick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button>
            </div>
          </div>
          <div class="card-body">
            <h5>Invoice #{{ $seller->invoice_id }} created on {{ $seller->invoice_date }}</h5>
            <div class="row my-8">
              <div class="col-6">
                <p class="h3">Location</p>
                <address>
                  Ringworld Corporation District, 235231<br>
                  West Java, Cianjur<br>
                  Indonesia, 25325131 <br>
                  Operated by {{ Auth::user()->name }}
                </address>
              </div>
              <div class="col-6 text-right">
                <p class="h3">Patron</p>
                <address>
                  {{ $patronData->patron_name }}<br>
                  {{ $patronData->patron_address }}<br>
                  {{ $patronData->patron_phone }}<br>
                  {{ $patronData->email }}
                </address>
              </div>
            </div>
            {{-- <div class="table-responsive push"> --}}
              <table class="table table-bordered table-hover" id="invoiceTable">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 1%">#</th>
                    <th>Items</th>
                    <th class="text-center" style="width: 1%">Quantity</th>
                    <th class="text-right" style="width: 10%">Unit Price</th>
                    <th class="text-right" style="width: 10%">Amount</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($itemData as $item)
                      @foreach ($sellerDetails as $sad)
                        @if ($item->id == $sad->item_id)
                          <tr>
                              <td class="text-center">{{ $item->id }}</td>
                              <td>
                                  <p class="font-w600 mb-1">{{ $item->item_name }}</p>
                                  <div class="text-muted">{{ $item->item_code }}</div>
                              </td>
                              <td class="text-center">
                                  {{ $sad->item_quantity }}
                              </td>
                              <td class="text-right">{{ $item->item_price }}</td>
                              <td class="text-right">{{ $item->item_price * $sad->item_quantity }}</td>
                          </tr>
                        @endif
                      @endforeach
                  @endforeach
                  </tbody>

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total Price</td>
                    <td id="totalPriceColumn"></td>
                  </tr>
              </table>
            {{-- </div> --}}
          </div>
        </div>
      </div>
    </div>

    @include('partials.footer')
@endsection
