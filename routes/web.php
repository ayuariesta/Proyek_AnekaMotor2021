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

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('contact/{id}', [App\Http\Controllers\ContactController::class, 'save']);
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile',  [App\Http\Controllers\ProfileController::class, 'update']);
Route::get('/booking', [App\Http\Controllers\BookingController::class, 'index'])->name('booking');
Route::post('booking/{id}', [App\Http\Controllers\BookingController::class, 'save']);
Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');
Route::get('history/{id}', [App\Http\Controllers\HistoryController::class, 'detail']);
Route::post('/booking/{id}',  [App\Http\Controllers\HistoryController::class, 'update']);