<?php

use App\Http\Controllers\DetailSaringanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('SaringanJakim.create');
});

Route::group(['prefix' => 'saringan', 'as' => 'saringan.'], function () {
    Route::get('/create', [DetailSaringanController::class, 'create'])->name('create');
    Route::post('store', [DetailSaringanController::class, 'store'])->name('store');
    Route::get('/congratulation', [DetailSaringanController::class, 'congratulation'])->name('congratulation');
});

Route::get('/country_code', [DetailSaringanController::class, 'getCountryCodes'])->name('country_code');
Route::post('/existing_user_detail', [DetailSaringanController::class, 'getExistingUserDetail'])->name('existing_user_detail');
