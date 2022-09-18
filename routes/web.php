<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\LoanController as AdminLoanController;
use App\Http\Controllers\Client\LoanController;

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

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => false,
    'reset'    => false,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false //,  // for email verification
]);

Route::get('/', function () {
    if (Auth::check()) {
        return (auth()->user()->role->id === 1)
            ? redirect()->route('administrator.home')
            : redirect()->route('client.home');
    } else {
        return redirect()->route('login');
    }
});

Route::prefix('client')->name('client.')->middleware(['auth', 'permitted.user'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('loans',  LoanController::class);
});

Route::prefix('administrator')->name('administrator.')->middleware(['auth', 'permitted.user'])->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');
    Route::get('loans/toggle-status/{uuid}/{status}', [AdminLoanController::class, 'toggleStatus'])->name('loans.toggle_status');
    Route::resource('loans',  LoanController::class);
});
