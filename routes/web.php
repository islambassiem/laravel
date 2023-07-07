<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/invoices', InvoicesController::class);
Route::resource('/sections', SectionsController::class);
Route::resource('/products', ProductsController::class);

Route::get('/{page}', [AdminController::class, 'index']);

Route::get('/section/{id}', [InvoicesController::class ,'getproducts']);

Route::get('InvoicesDetails/{id}', [InvoicesDetailsController::class, 'getInvoice']);

Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'open_file']);

Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'get_file']);

Route::post('delete_file', [InvoicesDetailsController::class,'destroy'])->name('delete_file');

Route::get('/edit_invoice/{id}', [InvoicesController::class, 'edit']);

Route::get('/Status_show/{id}', [InvoicesController::class, 'show'])->name('Status_show');

Route::post('/Status_Update/{id}', [InvoicesController::class, 'Status_Update'])->name('Status_Update');
