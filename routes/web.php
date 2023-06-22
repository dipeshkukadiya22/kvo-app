<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\donation;
use App\Http\Controllers\Expense;

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

/* Route::get('/', function () {
    return view('welcome');
});

*/

/* Room Booking Route */
Route::get('/', [BookingController::class, 'RoomBooking'])->name('RoomBooking');
Route::get('Religious_Donation', [donation::class, 'Religious_Donation'])->name('Religious_Donation');
Route::get('Community_Donation', [donation::class, 'Community_Donation'])->name('Community_Donation');
Route::get('Donation_Receipt', [donation::class, 'Donation_Receipt'])->name('Donation_Receipt');
Route::get('Expense_Receipt', [Expense::class, 'Expense_Receipt'])->name('Expense_Receipt');