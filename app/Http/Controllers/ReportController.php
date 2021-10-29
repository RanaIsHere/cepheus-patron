<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\SellerDetails;
use App\Models\Patrons;
use App\Models\Items;

class ReportController extends Controller
{
    public function defaultInvoiceList()
    {
        $sellerData = Seller::all();
        return view('reports.invoice', ['page' => 'Invoices', 'sellerData' => $sellerData]);
    }

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

        return view('dashboard.invoice', ['page' => 'Invoices', 'itemData' => $itemData, 'sellerDetails' => $sellerDetails, 'seller' => $seller, 'patronData' => $patronData]);
    }
}
