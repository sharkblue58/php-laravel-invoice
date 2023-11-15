<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;


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


Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('invoices',InvoiceController::class);
Route::get('section/{id}',[InvoiceController::class,'getProducts']);

Route::resource('sections',SectionController::class);

Route::resource('products',ProductController::class);

Route::get('InvoicesDetails/{id}',[InvoiceDetailController::class,'edit']);

Route::get('view_file/{invoice_number}/{file_number}',[InvoiceDetailController::class,'openFile'])->name('file.view');
Route::get('download_file/{invoice_number}/{file_number}',[InvoiceDetailController::class,'getFile'])->name('file.download');
Route::post('delete_file',[InvoiceDetailController::class,'destroy'])->name('file.delete');

Route::get('/{page}', [AdminController::class,'index']);

