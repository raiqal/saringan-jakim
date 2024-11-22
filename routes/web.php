<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailSaringanController;

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
    return view('saringan.create');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'saringan', 'as' => 'saringan.'], function () {
    Route::get('/create', [DetailSaringanController::class, 'create'])->name('create');
    Route::post('store', [DetailSaringanController::class, 'store'])->name('store');
    Route::get('/congratulation', [DetailSaringanController::class, 'congratulation'])->name('congratulation');
});

Route::get('/country_code', [DetailSaringanController::class, 'getCountryCodes'])->name('country_code');
Route::get('/existing_user_detail', [DetailSaringanController::class, 'getExistingUserDetail'])->name('existing_user_detail');
