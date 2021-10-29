@extends('preload.default')

@section('container')
    @include('partials.header')

    <div class="container">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">#<a href="/dashboard/invoices/{{ $purchasesData->collection_code }}">{{ $purchasesData->collection_code }}</a></h3>
            
            {{-- <div class="card-options">
              <button type="button" class="btn btn-primary" onclick="javascript:window.print();"><i class="si si-printer"></i> Print </button>
            </div> --}}
          </div>
          <div class="card-body">
            <h5>Collection Details: #{{ $purchasesData->collection_code }} created on {{ $purchasesData->collection_date }}</h5>
            <div class="row my-8">
              <div class="col-md-6">
                <p class="h3">Location</p>
                <address>
                  Ringworld Corporation District, 235231<br>
                  West Java, Cianjur<br>
                  Indonesia, 25325131 <br>
                  Operated by {{ Auth::user()->name }}
                </address>
              </div>

              <div class="col-md-6 text-right">
                <p class="h3">Delivering:</p>
                <address>
                  Item: {{ $paymentDetails->items->item_name }}<br>
                  From: Elizabeth Factories <br>
                  To: Ringworld Warehouse District, Origin Corp <br>
                  Stocks Added: <b>{{ $paymentDetails->quantity }}</b> <br>
                  Total Price: Rp. {{ $purchasesData->total }} <br>
                  By: {{ $purchasesData->suppliers->supplier_name }}
                </address>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('partials.footer')
@endsection