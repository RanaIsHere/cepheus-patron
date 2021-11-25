<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use Facade\FlareClient\Report;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login
Route::get('/', [LoginController::class, 'defaultIndex']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth.basic');
Route::post('/deleteUser', [LoginController::class, 'deleteUser'])->middleware('auth.basic');
Route::post('/', [LoginController::class, 'login']);

// Dashboard

// Admin
Route::group(['middleware' => ['auth.basic', 'privilege:ADMIN']], function () {
    Route::get('/dashboard/register', [DashboardController::class, 'defaultRegister']);
    Route::post('/dashboard/register', [DashboardController::class, 'registerUser']);
});

// Operator
Route::group(['middleware' => ['auth.basic', 'privilege:OPERATOR']], function () {
    Route::get('/dashboard/transactions', [DashboardController::class, 'defaultTransactions']);
    Route::get('/dashboard/supply', [DashboardController::class, 'defaultSupply']);

    Route::post('/dashboard/transactions/sell', [DashboardController::class, 'sellItems']);
    Route::post('/dashboard/supply/buy', [DashboardController::class, 'buySupply']);
});

// EDP
Route::group(['middleware' => ['auth.basic', 'privilege:EDP']], function () {
    Route::post('/dashboard/items', [DashboardController::class, 'addItems']);
    Route::post('/dashboard/suppliers', [DashboardController::class, 'addSupplier']);
    Route::post('/dashboard/patrons', [DashboardController::class, 'addPatrons']);
    Route::post('/dashboard/products', [DashboardController::class, 'addProducts']);
    Route::post('/dashboard/health/pull', [DashboardController::class, 'pullItem']);

    Route::get('/dashboard/patrons', [DashboardController::class, 'defaultPatrons']);
    Route::get('/dashboard/suppliers', [DashboardController::class, 'defaultSuppliers']);
    Route::get('/dashboard/products', [DashboardController::class, 'defaultProducts']);
    Route::get('/dashboard/health', [DashboardController::class, 'defaultHealth']);
});

// General Accesss
Route::get('/dashboard', [DashboardController::class, 'defaultIndex'])->middleware('auth.basic');
Route::get('/dashboard/settings', [DashboardController::class, 'defaultSettings'])->middleware('auth.basic');
Route::post('/dashboard/deleteUser', [DashboardController::class, 'deleteUser'])->middleware('auth.basic');
Route::post('/dashboard/changeTheme', [DashboardController::class, 'setTheme'])->middleware('auth.basic');


// Reports

// Operators
Route::group(['middleware' => ['auth.basic', 'privilege:OPERATOR,ADMIN']], function () {
    Route::get('/dashboard/special', [DashboardController::class, 'defaultSpecial'])->name('special');
    Route::get('/dashboard/reports/invoices', [ReportController::class, 'defaultInvoiceList']);
    Route::get('/dashboard/reports/invoices/{id}', [ReportController::class, 'defaultInvoice']);
    Route::get('/dashboard/reports/stocks', [ReportController::class, 'defaultStocksList']);
    Route::get('/dashboard/reports/stocks/{collection_code}', [ReportController::class, 'defaultStocks']);

    Route::post('/dashboard/deleteRequest', [DashboardController::class, 'deleteRequest'])->name('deleteRequest');
    Route::post('/dashboard/editSpecial', [DashboardController::class, 'editSpecial'])->name('editSpecial');
    Route::post('/dashboard/changeStatus', [DashboardController::class, 'changeSpecialStatus'])->name('changeSpecialStatus');
    Route::post('/dashboard/requestSpecial', [DashboardController::class, 'requestSpecial'])->name('requestSpecial');
});

// Admin
Route::group(['middleware' => ['auth.basic', 'privilege:ADMIN']], function () {
    Route::get('/dashboard/reports/profits/{dateSync}', [ReportController::class, 'defaultProfits']);

    // Exports
    Route::get('/dashboard/reports/exportSellerData', [ReportController::class, 'exportSellerData'])->name('exportSellerData');
    Route::get('/dashboard/reports/exportSellerDetailsData', [ReportController::class, 'exportSellerDetails'])->name('exportSellerDetails');
    Route::get('/dashboard/reports/exportPurchasesData', [ReportController::class, 'exportPurchases'])->name('exportPurchases');
});
