<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seller;
use App\Models\SellerDetails;
use App\Models\Patrons;
use App\Models\Items;
use App\Models\Purchases;
use App\Models\PaymentDetails;
use App\Models\Suppliers;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;

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

    public function defaultProfits($dateSync)
    {
        if ($dateSync == 'present')
        {
            $sellerData = Seller::all();
            $sellerDetailsData = SellerDetails::all();
            $itemsData = Items::all();
            $productsData = Products::all();
    
            $purchasesData = Purchases::all();
            $paymentDetailsData = PaymentDetails::all();
            $supplierData = Suppliers::all();
            $patronData = Patrons::all();
            $userData = User::all();
        } else if ($dateSync == 'last_week')
        {
            $sellerData = Seller::where('created_at', '<=', Carbon::now()->subDays(7)->toDateTimeString())->get();
            $sellerDetailsData = SellerDetails::where('created_at', '<=', Carbon::now()->subDays(7)->toDateTimeString())->get();
            $itemsData = Items::where('created_at', '<=', Carbon::now()->subDays(7)->toDateTimeString())->get();
            $productsData = Products::where('created_at', '<=', Carbon::now()->subDays(7)->toDateTimeString())->get();
    
            $purchasesData = Purchases::where('created_at', '<=', Carbon::now()->subDays(7)->toDateTimeString())->get();
            $paymentDetailsData = PaymentDetails::where('created_at', '<=', Carbon::now()->subDays(7)->toDateTimeString())->get();
            $supplierData = Suppliers::where('created_at', '<=', Carbon::now()->subDays(7)->toDateTimeString())->get();
            $patronData = Patrons::where('created_at', '<=', Carbon::now()->subDays(7)->toDateTimeString())->get();
            $userData = User::where('created_at', '<=', Carbon::now()->subDays(7)->toDateTimeString())->get();
        } else if ($dateSync == 'last_month')
        {
            $sellerData = Seller::where('created_at', '<=', Carbon::now()->subMonth()->toDateTimeString())->get();
            $sellerDetailsData = SellerDetails::where('created_at', '<=', Carbon::now()->subMonth()->toDateTimeString())->get();
            $itemsData = Items::where('created_at', '<=', Carbon::now()->subMonth()->toDateTimeString())->get();
            $productsData = Products::where('created_at', '<=', Carbon::now()->subMonth()->toDateTimeString())->get();
    
            $purchasesData = Purchases::where('created_at', '<=', Carbon::now()->subMonth()->toDateTimeString())->get();
            $paymentDetailsData = PaymentDetails::where('created_at', '<=', Carbon::now()->subMonth()->toDateTimeString())->get();
            $supplierData = Suppliers::where('created_at', '<=', Carbon::now()->subMonth()->toDateTimeString())->get();
            $patronData = Patrons::where('created_at', '<=', Carbon::now()->subMonth()->toDateTimeString())->get();
            $userData = User::where('created_at', '<=', Carbon::now()->subMonth()->toDateTimeString())->get();
        } else if ($dateSync == 'last_year')
        {
            $sellerData = Seller::where('created_at', '<=', Carbon::now()->subYear()->toDateTimeString())->get();
            $sellerDetailsData = SellerDetails::where('created_at', '<=', Carbon::now()->subYear()->toDateTimeString())->get();
            $itemsData = Items::where('created_at', '<=', Carbon::now()->subYear()->toDateTimeString())->get();
            $productsData = Products::where('created_at', '<=', Carbon::now()->subYear()->toDateTimeString())->get();
    
            $purchasesData = Purchases::where('created_at', '<=', Carbon::now()->subYear()->toDateTimeString())->get();
            $paymentDetailsData = PaymentDetails::where('created_at', '<=', Carbon::now()->subYear()->toDateTimeString())->get();
            $supplierData = Suppliers::where('created_at', '<=', Carbon::now()->subYear()->toDateTimeString())->get();
            $patronData = Patrons::where('created_at', '<=', Carbon::now()->subYear()->toDateTimeString())->get();
            $userData = User::where('created_at', '<=', Carbon::now()->subYear()->toDateTimeString())->get();
        }
        

        return view('reports.profits', ['page' => 'Profits', 'sellerData' => $sellerData, 'sellerDetailsData' => $sellerDetailsData, 'itemsData' => $itemsData, 'productsData' => $productsData, 'purchasesData' => $purchasesData, 'paymentDetailsData' => $paymentDetailsData, 'supplierData' => $supplierData, 'patronData' => $patronData, 'userData' => $userData, 'passageOfTime' => $dateSync]);
    }
}
