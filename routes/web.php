<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\donation;
use App\Http\Controllers\Expense;
use App\Http\Controllers\pdfcontroller;
use App\Http\Controllers\MedicalController;


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
//Route::get('/login', [AuthController::class, 'LoginUser'])->name('LoginUser');
Route::get('login',[AuthController::class,'LoginUser'])->name('login');
Route::post('login',[AuthController::class,'check_user'])->name('check_user');
Route::get('login',[AuthController::class,'destroy'])->name('destroy');
//Route::get('/',[authentication::class,'login']);

/* Room Booking Route */

Route::POST('RoomBooking', [BookingController::class, 'RoomBooking'])->name('RoomBooking');
Route::get('room-booking', [BookingController::class, 'index']);
Route::POST('room-booking', [BookingController::class, 'add_member'])->name('room-booking');




/* Room list Route */
Route::get('/room-list', [BookingController::class, 'RoomList'])->name('RoomList');

/* View Members Route */
Route::get('/view-members', [MembersController::class, 'ViewMembers'])->name('ViewMembers');
Route::POST('/edit_members', [MembersController::class, 'edit_members'])->name('edit_members');


Route::get('Religious_Donation', [donation::class, 'index1'])->name('Religious_Donation');
Route::POST('ReligiousDonation', [donation::class, 'Religious_Donation'])->name('ReligiousDonation');
Route::get('View_Religious_Donation', [donation::class, 'View_Religious_Donation'])->name('View_Religious_Donation');
Route::get('/delete_religious_donation/{id}', [donation::class, 'delete_religious_donation'])->name('delete_religious_donation');
Route::get('/get_religious_donation/{id}',[donation::class,'get_religious_donation'])->name('get_religious_donation');
Route::post('update_religious_donation',[donation::class,'update_religious_donation'])->name('update_religious_donation');


Route::get('Community_Donation', [donation::class, 'index'])->name('Community_Donation');
Route::POST('CommunityDonation', [donation::class, 'Community_Donation'])->name('CommunityDonation');
Route::get('/View_Community_Donation',  [donation::class, 'View_Community_Donation']) -> name('View_Community_Donation');
Route::get('/get_community_donation/{id}',[donation::class,'get_community_donation'])->name('get_community_donation');
Route::get('/delete_community_donation/{id}',[donation::class,'delete'])->name('delete_community_donation');
Route::post('/update_community_donation',[donation::class,'update_community_donation'])->name('update_community_donation');

Route::get('General_Donation', [donation::class, 'General_Donation'])->name('General_Donation');
Route::post('add_general_donation',[donation::class, 'add_general_donation'])->name('add_general_donation');
Route::get('View_General_Donation', [donation::class, 'view_general_donation'])->name('view_general_donation');
Route::get('/delete_general_donation/{id}', [donation::class, 'delete_general_donation'])->name('delete_general_donation');
Route::get('/get_general_donation/{id}',[donation::class,'get_general_donation'])->name('get_general_donation');
Route::post('update_general_donation',[donation::class,'update_general_donation'])->name('update_general_donation');

Route::get('Sangh_Expense', [Expense::class, 'Sangh_Expense'])->name('Sangh_Expense');
Route::post('add_sangh_expense', [Expense::class, 'add_sangh_expense'])->name('add_sangh_expense');
Route::get('View_Sangh_Expense', [Expense::class, 'view_sangh_expense'])->name('View_Sangh_Expense');
Route::get('/delete_sangh_expense/{id}', [Expense::class, 'delete_sangh_expense'])->name('delete_sangh_expense');
Route::get('/get_sangh_expense/{id}',[Expense::class,'get_sangh_expense'])->name('get_sangh_expense');
Route::post('update_sangh_expense',[Expense::class,'update_sangh_expense'])->name('update_sangh_expense');

Route::get('Mahajan_Expense', [Expense::class, 'Mahajan_Expense'])->name('Mahajan_Expense');
Route::post('add_mahajan_expense', [Expense::class, 'add_mahajan_expense'])->name('add_mahajan_expense');
Route::get('View_Mahajan_Expense', [Expense::class, 'view_mahajan_expense'])->name('view_mahajan_expense');
Route::get('/delete_mahajan_expense/{id}', [Expense::class, 'delete_mahajan_expense'])->name('delete_mahajan_expense');
Route::get('/get_mahajan_expense/{id}',[Expense::class,'get_mahajan_expense'])->name('get_mahajan_expense');
Route::post('update_mahajan_expense',[Expense::class,'update_mahajan_expense'])->name('update_mahajan_expense');

Route::get('treatment',[MedicalController::class,'show'])->name('show');
Route::post('add_treatment',[MedicalController::class,'add'])->name('add_treatment');
Route::post('update_treatment',[MedicalController::class,'update'])->name('update_treatment');
Route::get('/get/{id}',[MedicalController::class,'get'])->name('get');
Route::get('/get_member/{id}',[MedicalController::class,'get_member'])->name('get_member');
Route::get('view_treatment',[MedicalController::class,'view_treatment'])->name('view_treatment');
Route::get('edit_treatment/{id}',[MedicalController::class,'edit_treatment'])->name('edit_treatment');
Route::get('delete_treatment/{id}',[MedicalController::class,'delete_treatment'])->name('delete_treatment');

Route::get('/pdf_Religious_Donation/{id}',[pdfcontroller::class,'pdf_Religious_Donation'])->name('pdf_Religious_Donation');
Route::get('/pdf_Community_Donation/{id}',[pdfcontroller::class,'pdf_Community_Donation'])->name('pdf_Community_Donation');
Route::get('/pdf_Medical_Treatment/{id}',[pdfcontroller::class,'pdf_Medical_Treatment'])->name('pdf_Medical_Treatment');
Route::get('/pdf_General_Donation/{id}',[pdfcontroller::class,'pdf_General_Donation'])->name('pdf_General_Donation');
Route::get('/pdf_Mahajan_Expense/{id}',[pdfcontroller::class,'pdf_Mahajan_Expense'])->name('pdf_Mahajan_Expense');
Route::get('/pdf_Sangh_Expense/{id}',[pdfcontroller::class,'pdf_Sangh_Expense'])->name('pdf_Sangh_Expense');


