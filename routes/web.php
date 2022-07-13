<?php

use App\Http\Controllers\reportsController;
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
    return view('index');
});

// process
Route::post('/admin_login', [reportsController::class,'index'])->name('admin_login');
Route::post('/addReport', [reportsController::class,'addReport'])->name('addReport');

Route::post('/edit_report', [reportsController::class,'edit_report'])->name('edit_report');
Route::post('/cancel', [reportsController::class,'cancel'])->name('cancel');
Route::post('/resolve_report', [reportsController::class,'resolve_report'])->name('/resolve_report');
Route::post('/update_report', [reportsController::class,'update_report'])->name('update_report');

// Route::get('/export', [reportsController::class,'export'])->name('export');
// Route::post('/export', [reportsController::class,'export'])->name('export');
// Route::get('/export/{from}/{to}/{personel}/{status}', [reportsController::class,'export'])->name('export');
Route::get('/export/{personel}', [reportsController::class,'export'])->name('export');
Route::post('/filter', [reportsController::class,'filter'])->name('/filter');

// pages
// Route::get('/history', [reportsController::class,'history'])->name('history');
Route::get('/admin', [reportsController::class,'admin'])->name('admin');
Route::get('/guest', [reportsController::class,'guest'])->name('guest');
Route::get('/logout', [reportsController::class,'logout'])->name('logout');