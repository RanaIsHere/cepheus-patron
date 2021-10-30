<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Patrons;
use App\Models\Products;
use App\Models\Items;
use App\Models\Suppliers;
use App\Models\User;
use App\Models\Seller;
use App\Models\SellerDetails;
use App\Models\PayBuffer;
use App\Models\Purchases;
use App\Models\PaymentDetails;

class DashboardController extends Controller
{
    public function defaultIndex()
    {
        $userData = User::all();
        return view('dashboard.index', ['page' => 'Dashboard', 'userData' => $userData]);
    }

    public function defaultPatrons()
    {
        $patronData = Patrons::all();
        return view('dashboard.patrons', ['page' => 'Patrons', 'patronData' => $patronData]);
    }

    public function defaultProducts()
    {
        $productData = Products::all();
        $itemData = Items::all();
        return view('dashboard.products', ['page' => 'Products', 'productData' => $productData, 'itemData' => $itemData]);
    }

    public function defaultSuppliers()
    {
        $supplierData = Suppliers::all();
        return view('dashboard.suppliers', ['page' => 'Suppliers', 'supplierData' => $supplierData]);
    }

    public function defaultRegister()
    {
        $userData = User::all();
        return view('dashboard.register', ['page' => 'Register', 'userData' => $userData]);
    }

    public function defaultSettings()
    {
        return view('dashboard.settings', ['page' => 'Settings']);
    }

    public function defaultTransactions()
    {
        $itemData = Items::all();
        $productData = Products::all();
        $patronData  = Patrons::all();
        return view('dashboard.transactions', ['page' => 'Transactions', 'itemData' => $itemData, 'productData' => $productData, 'patronData' => $patronData]);
    }

    public function defaultSupply()
    {
        $supplierData = Suppliers::all();
        $itemData = Items::all();
        return view('dashboard.supply', ['page' => 'Supply', 'itemData' => $itemData, 'supplierData' => $supplierData]);
    }

    public function addPatrons(Request $request)
    {
        $validatedData = $request->validate([
            'patron_name' => ['required'],
            'patron_address' => ['required'],
            'patron_phone' => ['required'],
            'email' => ['required']
        ]);

        $patrons = new Patrons;

        $patrons->patron_code = 'SCP';
        $patrons->patron_name = $validatedData['patron_name'];
        $patrons->patron_address = $validatedData['patron_address'];
        $patrons->patron_phone = $validatedData['patron_phone'];
        $patrons->email = $validatedData['email'];

        if ($patrons->save()) {
            $id = $patrons->id;

            $patrons->patron_code = 'SCP' . $id;

            if ($patrons->save()) {
                return redirect('/dashboard/patrons')->with('success', 'Welcome to Cepheus Patron, welcomed Patrons.');
            }
        }
    }

    public function addProducts(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => ['required']
        ]);

        $products = new Products;

        $products->product_name = strtoupper($validatedData['product_name']);

        if ($products->save()) 
        {
            return redirect('/dashboard/products')->with('success', 'Product successfully added');
        }
    }

    public function addItems(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => ['required'],
            'item_name' => ['required'],
            'collection_quantity' => ['required'],
            'item_price' => ['required'],
            'item_stock' => ['required']
        ]);

        $items = new Items;

        $items->item_code = 'ITC';
        $items->product_id = $validatedData['product_id'];
        $items->item_name = $validatedData['item_name'];
        $items->collection_quantity = $validatedData['collection_quantity'];
        $items->item_price = $validatedData['item_price'];
        $items->item_stock = $validatedData['item_stock'];

        if ($items->save()) {
            $id = $items->id;
            
            $items->item_code = 'ITC' . $id;

            if ($items->save()) {
                return redirect('/dashboard/products')->with('success', 'Item successfully added!');
            }
        }
    }

    public function addSupplier(Request $request)
    {
        $validatedData = $request->validate([
            'supplier_name' => ['required'],
            'supplier_address' => ['required'],
            'supplier_city' => ['required'],
            'supplier_phone' => ['required'],
        ]);

        $suppliers = new Suppliers;

        $suppliers->supplier_code = 'SUC';
        $suppliers->supplier_name = $validatedData['supplier_name'];
        $suppliers->supplier_address = $validatedData['supplier_address'];
        $suppliers->supplier_city = $validatedData['supplier_city'];
        $suppliers->supplier_phone = $validatedData['supplier_phone'];

        if ($suppliers->save()) {
            $id = $suppliers->id;

            $suppliers->supplier_code = 'SUC' . $id;

            if ($suppliers->save()) {
                return redirect('/dashboard/suppliers')->with('success', 'Supplier has been successfully registered into the system!');
            }
        }
    }

    public function registerUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'level' => ['required']
        ]);

        $user = new User;

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->level = $validatedData['level'];

        if ($user->save()) {
            return redirect('/dashboard/register')->with('success', 'Registration successful!');
        }
    }

    public function deleteUser(Request $request)
    {
        $validatedData = $request->validate([
            'id' => ['required'],
            'allow' => ['required']
        ]);

        if ($validatedData['allow'] == 'ACCEPTED') {
            DB::table('users')->where('id', $validatedData['id'])->delete();
        } else {
            DB::table('users')->where('id', $validatedData['id'])->update(['isDeletion' => 0]);
        }

        return redirect('/dashboard/register');
    }

    public function sellItems(Request $request)
    {

        $validatedData = $request->validate([
            'chosen_items' => ['required'],
            'patron_id' => ['required'],
            'total_amount' => ['required'],
            'quantity_of_items' => ['required'],
        ]);    

        $tax = 2500;
        $quantityOfItems = $validatedData['quantity_of_items'];
        // dd($validatedData['chosen_items']);
        $chosen_items[] = $validatedData['chosen_items'];

        // dd(array_key_first($chosen_items[0]));
        // Singular item selling error fix
        $totalAmount = 0;
        if (count($chosen_items[0]) > 1) {
            for ($i = array_key_first($chosen_items[0]); $i < $quantityOfItems+1; $i++) {
                if (in_array($i, array_keys($chosen_items[0]))) {
                    $totalAmount += Items::where('id', $chosen_items[0][$i]['id'])->first()->item_price * $chosen_items[0][$i]['quantity'];
                }
            }
        } else {
            $totalAmount += Items::where('id', $chosen_items[0][array_key_first($chosen_items[0])]['id'])->first()->item_price * $chosen_items[0][array_key_first($chosen_items[0])]['quantity'];
        }

        // var_dump($chosen_items);
        // dd($chosen_items[0][3]['id']);
        // dd(count($chosen_items[0]));

        $seller = new Seller;
        
        $seller->invoice_id = '0';
        $seller->invoice_date = now()->format('ymd');
        $seller->total_amount = $totalAmount;
        $seller->patron_id = $validatedData['patron_id'];
        $seller->user_id = Auth::user()->id;
        
        if ($seller->save())
        {
            $seller_id = $seller->id;
            $seller->invoice_id = 'IVY' . $seller_id . $seller->invoice_date;

            if ($seller->update())
            {
                // foreach ($chosen_items as $i => $items[])
                if (count($chosen_items[0]) > 1) {
                    // for ($i = array_key_first($chosen_items[0]); $i < $quantityOfItems+2; $i++)
                    for ($i = 0; $i < $quantityOfItems+10; $i++)
                    {
                        // var_dump($i);
                        if (in_array($i, array_keys($chosen_items[0]))) {
                            // var_dump($i);
                            // dd($i);
                            // dd($chosen_items[0][$i]['quantity']);
                            // dd(array_count_values($validatedData['chosen_items'])); Get all same values as duplicate keys
                            $seller_details = new SellerDetails;
                            // $item_quantity = $validatedData['quantity_of_items'];
                            $item_quantity = (int)$chosen_items[0][$i]['quantity'];
                            $seller_details->seller_id = $seller_id;
                            $seller_details->item_id = (int)$chosen_items[0][$i]['id'];
                            // var_dump($chosen_items[0][$i]['quantity']);
                            $seller_details->item_price = Items::where('id', $chosen_items[0][$i]['id'])->first()->item_price;
                            $seller_details->item_quantity = (int)$item_quantity;
                            $seller_details->sub_total = Items::where('id', $chosen_items[0][$i]['id'])->first()->item_price * $item_quantity;
                            $seller_details->save();
                        }
                        // } else {
                        //     var_dump(in_array($i, $chosen_items[0][array_key_first($chosen_items[0])]));
                        // }
                    }
                } else {
                    $seller_details = new SellerDetails;

                    $item_quantity = $chosen_items[0][array_key_first($chosen_items[0])]['quantity'];
                    $seller_details->seller_id = $seller_id;
                    $seller_details->item_id = $chosen_items[0][array_key_first($chosen_items[0])]['id'];
                    $seller_details->item_price = Items::where('id', $chosen_items[0][array_key_first($chosen_items[0])]['id'])->first()->item_price;
                    $seller_details->item_quantity = (int)$item_quantity;
                    $seller_details->sub_total = Items::where('id', $chosen_items[0][array_key_first($chosen_items[0])]['id'])->first()->item_price * $item_quantity;
                    $seller_details->save();
                }

                // dd($chosen_items[0]);

                $pay_buffer = new PayBuffer;

                $pay_buffer->seller_id = $seller_id;
                $pay_buffer->total = $totalAmount + $tax;
                $pay_buffer->commited = $totalAmount;
                $pay_buffer->returning = $tax;
            
                if ($pay_buffer->save()) {
                    return redirect('/dashboard/reports/invoices/' . $seller->invoice_id)->with('success', 'Transaction successful!');
                }
            }
        }
    }

    public function buySupply(Request $request) 
    {
        $validatedData = $request->validate([
            'supplier_id' => ['required'],
            'stock_quantity' => ['required'],
            'total_amount' => ['required'],
            'item_id' => ['required']
        ]);

        // dd($validatedData);

        $purchases = new Purchases;

        $purchases->collection_code = '0';
        $purchases->collection_date = now();
        $purchases->total = $validatedData['total_amount'];
        $purchases->supplier_id = $validatedData['supplier_id'];
        $purchases->user_id = Auth::user()->id;

        if ($purchases->save())
        {  
            $id = $purchases->id;

            $purchases->collection_code = 'COC' . $id;

            if ($purchases->update()) {
                $paymentDetails = new PaymentDetails;

                $paymentDetails->purchase_id = $id;
                $paymentDetails->item_id = $validatedData['item_id'];
                $paymentDetails->item_price = Items::where('id', $validatedData['item_id'])->first()->item_price;
                $paymentDetails->quantity = $validatedData['stock_quantity'];
                $paymentDetails->sub_total = Items::where('id', $validatedData['item_id'])->first()->item_price * $validatedData['stock_quantity'];

                if ($paymentDetails->save()) {
                    $items = Items::where('id', $validatedData['item_id'])->first();

                    $items->item_stock += (int)$validatedData['stock_quantity'];

                    $items->update();

                    return redirect('/dashboard/supply')->with('success', 'Supply sent!');
                }
            }
        }
    }

    public function setTheme(Request $request)
    {
        $validatedData = $request->validate([
            'option' => ['required']
        ]);

        // $response = new Response('Changing theme');
        setcookie('theme', $validatedData['option'], time() + (86400 * 30), '/');

        return redirect('/dashboard/settings');
    }
}
