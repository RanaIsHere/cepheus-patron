<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [LoginController::class, 'defaultIndex']);
Route::post('/', [LoginController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'defaultIndex']);
Route::get('/dashboard/patrons', [DashboardController::class, 'defaultPatrons']);
Route::get('/dashboard/products', [DashboardController::class, 'defaultProducts']);
Route::get('/dashboard/suppliers', [DashboardController::class, 'defaultSuppliers']);
Route::get('/dashboard/register', [DashboardController::class, 'defaultRegister']);

Route::post('/dashboard/patrons', [DashboardController::class, 'addPatrons']);
Route::post('/dashboard/products', [DashboardController::class, 'addProducts']);
Route::post('/dashboard/items', [DashboardController::class, 'addItems']);
Route::post('/dashboard/suppliers', [DashboardController::class, 'addSupplier']);
Route::post('/dashboard/register', [DashboardController::class, 'registerUser']);