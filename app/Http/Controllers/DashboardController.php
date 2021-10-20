<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Patrons;
use App\Models\Products;
use App\Models\Items;
use App\Models\Suppliers;
use App\Models\User;

class DashboardController extends Controller
{
    public function defaultIndex()
    {
        return view('dashboard.index', ['page' => 'Dashboard']);
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
