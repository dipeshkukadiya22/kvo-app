<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;

use App\Http\Controllers\MembersController;
use App\Http\Controllers\AuthController;


use App\Http\Controllers\donation;
use App\Http\Controllers\Expense;
use App\Http\Controllers\pdfcontroller;
use App\Http\Controllers\medical;
use App\Http\Controllers\ReportsController;


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

/* Auth Login Route */
Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('Dashboard');

/* Auth Login Route */
Route::get('/login', [AuthController::class, 'LoginUser'])->name('LoginUser');

/* Room Booking Route */

Route::POST('RoomBooking', [BookingController::class, 'RoomBooking'])->name('RoomBooking');
Route::get('room-booking', [BookingController::class, 'index']);
Route::POST('room-booking', [BookingController::class, 'add_member'])->name('room-booking');

// Checkout page
//Route::get('checkout', [BookingController::class, 'checkout']) -> name ('checkout');
Route::get('checkout', [BookingController::class, 'checkout'])->name('checkout');

/* Room list Route */
Route::get('room-list', [BookingController::class, 'ADDROOM'])->name('room-list');
Route::POST('RoomList', [BookingController::class, 'RoomList'])->name('RoomList');

//Route::POST('add_room', [BookingController::class, 'RoomList'])->name('RoomList');


/* View Members Route */
Route::get('/view-members', [MembersController::class, 'ViewMembers'])->name('ViewMembers');
Route::POST('/edit_members', [MembersController::class, 'edit_members'])->name('edit_members');


Route::get('Religious_Donation', [donation::class, 'index1'])->name('Religious_Donation');
Route::POST('ReligiousDonation', [donation::class, 'Religious_Donation'])->name('ReligiousDonation');

// Add Community_Donation
Route::get('Community_Donation', [donation::class, 'index'])->name('Community_Donation');
Route::POST('CommunityDonation', [donation::class, 'Community_Donation'])->name('CommunityDonation');

// View Community_Donation
Route::get('/View_Community_Donation',  [donation::class, 'View_Community_Donation']) -> name('View_Community_Donation');


Route::get('General_Donation', [donation::class, 'General_Donation'])->name('General_Donation');
Route::get('Expense_Receipt', [Expense::class, 'Expense_Receipt'])->name('Expense_Receipt');
Route::get('General_Donation_Report', [donation::class, 'General_Donation_Report'])->name('General_Donation_Report');
Route::get('pdf_Religious_Donation',[pdfcontroller::class,'pdf_Religious_Donation'])->name('pdf_Religious_Donation');
Route::get('pdf_Community_Donation',[pdfcontroller::class,'pdf_Community_Donation'])->name('pdf_Community_Donation');
Route::get('pdf_General_Donation',[pdfcontroller::class,'pdf_General_Donation'])->name('pdf_General_Donation');
Route::get('pdf_Expense_Receipt',[pdfcontroller::class,'pdf_Expense_Receipt'])->name('pdf_Expense_Receipt');
Route::get('treatment',[medical::class,'treatment'])->name('treatment');


//View Reports
Route::get('religious_donation_report', [ReportsController::class, 'religious_donation_report'])->name('religious_donation_report');