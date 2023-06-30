<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookingController;

use App\Http\Controllers\MembersController;


use App\Http\Controllers\donation;
use App\Http\Controllers\Expense;
use App\Http\Controllers\pdfcontroller;


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


/* Room list Route */
Route::get('/room-list', [BookingController::class, 'RoomList'])->name('RoomList');

/* View Members Route */
Route::get('/view-members', [MembersController::class, 'ViewMembers'])->name('ViewMembers');

Route::get('Religious_Donation', [donation::class, 'Religious_Donation'])->name('Religious_Donation');
Route::get('Community_Donation', [donation::class, 'Community_Donation'])->name('Community_Donation');
Route::get('General_Donation', [donation::class, 'General_Donation'])->name('General_Donation');
Route::get('Expense_Receipt', [Expense::class, 'Expense_Receipt'])->name('Expense_Receipt');
Route::get('General_Donation_Report', [donation::class, 'General_Donation_Report'])->name('General_Donation_Report');
Route::get('demopdf',[pdfcontroller::class,'demopdf'])->name('demopdf');

