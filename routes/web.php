<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('contact/{id}', [App\Http\Controllers\ContactController::class, 'save']);
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile',  [App\Http\Controllers\ProfileController::class, 'update']);
Route::get('/booking',  [App\Http\Controllers\ServiceController::class, 'index']);
Route::post('/booking/{id}',  [App\Http\Controllers\ServiceController::class, 'save']);
Route::post('/historyEdit/{id}',  [App\Http\Controllers\HistoryController::class, 'update']);
Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');
Route::get('history/{id}', [App\Http\Controllers\HistoryController::class, 'detail']);
Route::get('payment/{id}', [App\Http\Controllers\PaymentController::class, 'index']);
Route::get('seePayment/{id}', [App\Http\Controllers\PaymentController::class, 'seePayment']);
Route::post('payment/{id}', [App\Http\Controllers\PaymentController::class, 'save']);
Route::get('/sparepart', [App\Http\Controllers\SparepartController::class, 'render'])->name('sparepart');
Route::get('cari',[App\Http\Controllers\SparepartController::class, 'cari']);
Route::get('/sparepart/category/{category}', [App\Http\Controllers\CategoryController::class, 'render'])->name('spareparts.category');
Route::get('invoice/{id}', [App\Http\Controllers\HistoryController::class, 'invoice']);
Route::get('/serviceHistory',  [App\Http\Controllers\HistoryController::class, 'index_service'])->name('serviceHistory');
Route::get('serviceHistory/{id}', [App\Http\Controllers\HistoryController::class, 'detail_service']);

Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('index_get_user', 'App\Http\Controllers\Admin\CustomerController');
    Route::resource('index_get_typeService', 'App\Http\Controllers\Admin\TypeServiceController');
    Route::resource('index_get_category', 'App\Http\Controllers\Admin\CategoryController');
    Route::get('bookingdata', [App\Http\Controllers\Admin\BookingDataController::class, 'index'])->name('bookingdata');
    Route::get('bookingdata/detail/{id}', [App\Http\Controllers\Admin\BookingDataController::class, 'detail']);
    Route::post('bookingdata/detail/input_queue/{id}',[App\Http\Controllers\Admin\BookingDataController::class, 'save']);
    Route::get('bookingdata/invoice/{id}', [App\Http\Controllers\Admin\InvoiceController::class, 'detail']);
    Route::get('/addSaprepart', [App\Http\Controllers\Admin\InvoiceController::class, 'render']);
    Route::post('/sparepart/need/{id}', [App\Http\Controllers\Admin\InvoiceController::class, 'order']);
    Route::delete('sparepartDelete/{id}',  [App\Http\Controllers\Admin\InvoiceController::class, 'delete']);
    Route::post('InvoiceCompleted/{id}',[App\Http\Controllers\Admin\InvoiceController::class, 'konfirmasi']);
    Route::get('bookingdata/invoiceDone/{id}', [App\Http\Controllers\Admin\InvoiceController::class, 'invoice']);
});
