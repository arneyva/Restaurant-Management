<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

// Yang akan ditampilkan ketika web pertama kali dibuka (belum ada login)
// Route::get('/', function () {
//     return view('users.dashboard');
// });

// HomeController
Route::get('/home',[HomeController::class,'redirect']);
Route::get('/',[HomeController::class,'index']);
Route::get('/pesanansaya',[HomeController::class,'pesanansaya']);
Route::get('/cancelpesanansaya/{id}',[HomeController::class,'cancelpesanansaya']);
Route::post('/berhasilpesanmenu',[HomeController::class,'berhasilpesanmenu']);

// AdminController
Route::get('/detailmenu',[AdminController::class,'detailmenu']);
Route::get('/tambahmenu',[AdminController::class,'tambahmenu']);
Route::get('/menupesanan',[AdminController::class,'menupesanan']);
Route::get('/terimaorderan/{id}',[AdminController::class,'terimapesanan']);
Route::get('/tolakorderan/{id}',[AdminController::class,'tolakpesanan']);
Route::get('/updatemenu/{id}',[AdminController::class,'updatemenu']);
Route::get('/berhasildeletemenu/{id}',[AdminController::class,'berhasildeletemenu']);
Route::put('/berhasil_update_menu/{id}',[AdminController::class,'berhasilupdatemenu']);
// pake post karena berhubungan dengan mengirim form/data
Route::post('/berhasil_upload_menu',[AdminController::class,'berhasil_upload_menu']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
