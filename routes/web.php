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






/* Room list Route */
Route::get('/room-list', [BookingController::class, 'RoomList'])->name('RoomList');

/* View Members Route */
Route::get('/view-members', [MembersController::class, 'ViewMembers'])->name('ViewMembers');
Route::POST('/edit_members', [MembersController::class, 'edit_members'])->name('edit_members');





Route::get('Religious_Donation', [donation::class, 'Religious_Donation'])->name('Religious_Donation');

Route::get('Community_Donation', [donation::class, 'index'])->name('Community_Donation');
Route::POST('CommunityDonation', [donation::class, 'Community_Donation'])->name('CommunityDonation');

//Route::POST('General_Donation', [donation::class, 'add_member'])->name('General_Donation');
Route::get('General_Donation', [donation::class, 'index1']);
Route::POST('GeneralDonation', [donation::class, 'General_Donation'])->name('GeneralDonation');

Route::post('Mahajan_Expense', [Expense::class, 'add_member'])->name('mahajan_expense');
Route::get('Mahajan_Expense', [Expense::class, 'index'])->name('mahajan_expense_index');
Route::post('MahajanExpense', [Expense::class, 'Mahajan_Expense'])->name('mahajan_expense');


Route::get('Sangh_Expense', [Expense::class, 'Sangh_Expense'])->name('Sangh_Expense');

Route::get('General_Donation_Report', [donation::class, 'General_Donation_Report'])->name('General_Donation_Report');
Route::get('pdf_Religious_Donation',[pdfcontroller::class,'pdf_Religious_Donation'])->name('pdf_Religious_Donation');
Route::get('pdf_Community_Donation',[pdfcontroller::class,'pdf_Community_Donation'])->name('pdf_Community_Donation');
Route::get('pdf_General_Donation',[pdfcontroller::class,'pdf_General_Donation'])->name('pdf_General_Donation');
Route::get('pdf_Expense_Receipt',[pdfcontroller::class,'pdf_Expense_Receipt'])->name('pdf_Expense_Receipt');
Route::get('pdf_Religious_Expense_Receipt',[pdfcontroller::class,'pdf_Religious_Expense_Receipt'])->name('pdf_Religious_Expense_Receipt');
Route::get('treatment',[medical::class,'treatment'])->name('treatment');