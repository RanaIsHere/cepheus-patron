<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [LoginController::class, 'defaultIndex']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth.basic');
Route::post('/', [LoginController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'defaultIndex'])->middleware('auth.basic');
Route::get('/dashboard/patrons', [DashboardController::class, 'defaultPatrons'])->middleware('auth.basic');
Route::get('/dashboard/products', [DashboardController::class, 'defaultProducts'])->middleware('auth.basic');
Route::get('/dashboard/suppliers', [DashboardController::class, 'defaultSuppliers'])->middleware('auth.basic');
Route::get('/dashboard/register', [DashboardController::class, 'defaultRegister'])->middleware('auth.basic');

Route::post('/dashboard/patrons', [DashboardController::class, 'addPatrons'])->middleware('auth.basic');
Route::post('/dashboard/products', [DashboardController::class, 'addProducts'])->middleware('auth.basic');
Route::post('/dashboard/items', [DashboardController::class, 'addItems'])->middleware('auth.basic');
Route::post('/dashboard/suppliers', [DashboardController::class, 'addSupplier'])->middleware('auth.basic');
Route::post('/dashboard/register', [DashboardController::class, 'registerUser'])->middleware('auth.basic');