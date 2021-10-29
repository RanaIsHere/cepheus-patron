<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\SellerDetails;
use App\Models\Patrons;
use App\Models\Items;
use App\Models\Purchases;
use App\Models\PaymentDetails;
use App\Models\Suppliers;

class ReportController extends Controller
{
    // Lists
    public function defaultInvoiceList()
    {
        $sellerData = Seller::all();
        return view('reports.invoices', ['page' => 'Invoices', 'sellerData' => $sellerData]);
    }

    public function defaultStocksList()
    {
        $purchasesData = Purchases::all();
        return view('reports.stocks', ['page' => 'Stocks', 'purchasesData' => $purchasesData]);
    }

    // Inner Lists
    public function defaultInvoice($id)
    {
        $seller = Seller::where('invoice_id', $id)->first();
        // $seller = Seller::find($id);
        $sellerDetails = SellerDetails::where('seller_id', $seller->id)->get();
        // $sellerDetails = SellerDetails::find($id);
        $patronData = Patrons::where('id', $seller->patron_id)->first();
        // $itemData = Items::where('id', $seller->sellerDetails->item_id)->get();
        $itemData = Items::all();
        // dd($itemData);
        // $itemData = Items::find($id);

        return view('reports.invoice', ['page' => 'Invoices', 'itemData' => $itemData, 'sellerDetails' => $sellerDetails, 'seller' => $seller, 'patronData' => $patronData]);
    }

    public function defaultStocks($collection_code)
    {
        $purchasesData = Purchases::where('collection_code', $collection_code)->first();
        $paymentDetails = PaymentDetails::find($purchasesData->id);

        return view('reports.stock', ['page' => 'Stock', 'purchasesData' => $purchasesData, 'paymentDetails' => $paymentDetails]);
    }
}
